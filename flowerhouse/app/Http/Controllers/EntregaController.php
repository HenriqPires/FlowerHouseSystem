<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Venda;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function index()
    {

        $user = Auth::user();

    $entregas = ($user && $user->tipo === 'entregador')
        ? Entrega::with(['venda', 'entregador'])->where('entregador_id', $user->id)->get()
        : Entrega::with(['venda', 'entregador'])->get();

    return view('entregas.index', compact('entregas'));
    }

    public function create()
    {
        $vendas = Venda::with('produtos')->get(); // Adiciona contexto para select
        $entregadores = User::where('tipo', 'entregador')->get();
        return view('entregas.create', compact('vendas', 'entregadores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'entregador_id' => 'required|exists:users,id',
            'status' => 'required|in:pendente,entregue,problema',
            'data_entrega' => 'nullable|date',
            'observacoes' => 'nullable|string|max:1000',
        ]);

        Entrega::create($data);

        return redirect()->route('entregas.index')->with('success', 'Entrega cadastrada com sucesso!');
    }

    public function show(Entrega $entrega)
    {
        $entrega->load('venda.produtos', 'entregador');
        return view('entregas.show', compact('entrega'));
    }

    public function edit(Entrega $entrega)
    {
        $vendas = Venda::all();
        $entregadores = User::where('tipo', 'entregador')->get();
        return view('entregas.edit', compact('entrega', 'vendas', 'entregadores'));
    }

    public function update(Request $request, Entrega $entrega)
    {
        $data = $request->validate([
            'venda_id' => 'required|exists:vendas,id',
            'entregador_id' => 'required|exists:users,id',
            'status' => 'required|in:pendente,entregue,problema',
            'data_entrega' => 'nullable|date',
            'observacoes' => 'nullable|string|max:1000',
        ]);

        $entrega->update($data);

        return redirect()->route('entregas.index')->with('success', 'Entrega atualizada com sucesso!');
    }

    public function destroy(Entrega $entrega)
    {
        $entrega->delete();
        return redirect()->route('entregas.index')->with('success', 'Entrega removida com sucesso!');
    }

    public function confirmar(Entrega $entrega)
    {
        $entrega->update([
            'status' => 'entregue',
            'data_entrega' => now(),
        ]);

        return redirect()->back()->with('success', 'Entrega confirmada com sucesso!');
    }

    public function relatarProblema(Request $request, Entrega $entrega)
    {
        $data = $request->validate([
            'observacoes' => 'required|string|max:1000',
        ]);

        $entrega->update([
            'status' => 'problema',
            'observacoes' => $data['observacoes'],
        ]);

        return redirect()->back()->with('success', 'Problema relatado com sucesso!');
    }

    public function formRelatarProblema(Entrega $entrega)
    { 

        $user = Auth::user();

        if (!$user || $user->id !== $entrega->entregador_id) {
        abort(403, 'Acesso não autorizado.');
        }

    $sugestoes = collect([
        'Cliente ausente', 
        'Endereço incorreto', 
        'Destinatário recusou a entrega',
        'Problemas com o veículo ',
    ]);

    return view('entregas.relatar-problema', compact('entrega', 'sugestoes'));
    }

}
