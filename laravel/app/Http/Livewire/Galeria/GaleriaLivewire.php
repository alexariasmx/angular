<?php

namespace App\Http\Livewire\Galeria;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Galeria;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class GaleriaLivewire extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $body;
    public $imagen;
    public $unValor="empty";

    public function render()
    {
        return view('livewire.galeria.galeria-livewire',
        ['galerias' => Galeria::orderBy('id','desc')->paginate(12)]);
    }

    public function destroy($id){
        Galeria::destroy($id);
    }

    public function agregar(){

        $this->validate([
            'title'=>'required',
            'body'=>'required',
            'imagen'=>'required|image|max:1024',
        ]);

        $miImagen=$this->imagen->store('public');

        Galeria::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'image'=>$miImagen,

        ]);
        $this->reset(['title','body','imagen']);
    }

}
