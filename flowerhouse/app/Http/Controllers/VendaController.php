<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;



class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with(['funcionario', 'produtos'])->get();
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $produtos = Produto::where('quantidade_estoque', '>', 0)->get();
        return view('vendas.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'produtos' => 'required|array|min:1',
            'produtos.*.produto_id' => 'required|exists:produtos,id',
            'produtos.*.quantidade' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($data) {
            $venda = Venda::create([
                'funcionario_id' => Auth::id(),
                'data' => now(),
                'total' => 0, 
            ]);

            $total = 0;

            foreach ($data['produtos'] as $item) {
                $produto = Produto::findOrFail($item['produto_id']);
                $subtotal = $produto->preco * $item['quantidade'];
                $total += $subtotal;

                $venda->produtos()->attach($produto->id, [
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $produto->preco,
                ]);

                $produto->decrement('quantidade_estoque', $item['quantidade']);
            }

            $venda->update(['total' => $total]);
        });

        return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');
    }

    public function show(Venda $venda)
    {
        $venda->load('produtos', 'funcionario');
        return view('vendas.show', compact('venda'));
    }

    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!');
    }

    public function gerarRelatorioPdf(Request $request)
    {
        $query = Venda::with(['funcionario', 'produtos']);

    if ($request->filled('data_inicio') && $request->filled('data_fim')) {
        $query->whereBetween('data', [
            $request->input('data_inicio') . ' 00:00:00',
            $request->input('data_fim') . ' 23:59:59'
        ]);
    }

    $vendas = $query->get();

        $totalGeral = $vendas->sum('total');

        $pdf = Pdf::loadView('vendas.relatorio', compact('vendas',  'totalGeral'));

        return $pdf->download('relatorio_vendas.pdf');
    }
}
