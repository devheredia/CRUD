<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Exibir uma listagem do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(5);

        return view('events.index', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|min:2|max:255',
        'detail' => 'required|string|min:2|max:255',
        'status' => 'required|string|min:2|max:255',
        'local' => 'required|string|min:2|max:255',
        'date' => 'required|date|min:2|max:255',
            
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('Sucesso', 'Evento criado');
    }

    /**
     * Mostrar o formulário para editar o recurso especificado.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
    /**
     * Atualize o recurso especificado no armazenamento.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     * turn \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Remova o recurso especificado do armazenamento.
     *
     * @param \App\Models\Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'status' => 'required',
            'local' => 'required',
            'date' => 'required',


        ]);



        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'Evento atualizado com sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('Sucesso', 'Evento deletado com sucesso');
    }
}

