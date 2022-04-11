<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Homework;

class HomeworksController extends Controller
{
    
    /**
     * index para mostrar todos los homework
     * store para guardar un homework
     * update para actualizar un homework
     * edit para mostar el formulario de edicion
     */

     //Request sirve para obtener la informacion del formulario
     public function store(Request $request){
        
        //Validar los campos que esta recibiendo
        $request->validate([
            'title' => 'required|min:3'
        ]);

        //Insercion hacia la base de datos
        $homework = new Homework;
        $homework->title = $request->title; //Request->title es lo que obtiene del formulario
        $homework->category_id = $request->category_id;
        $homework->save(); //Guardamos los datos hacia la base de datos.
        return redirect()->route('addtask')->with('success' , 'Tarea craada correctamente');
        //Debemos crear la ruta en web una vez terminado. para ver la accion

     }

     //MOSTRAR TODO LA INFORMACION
     public function index(){
        $homeworks = Homework::all(); //ALL Muestra toda la informacion de la base de data
        $categories = Category::all();
        //Retorna a la vista toda la informacion y lo almacena en una arreglo.
        return view('layout.index' ,  ['homeworks' => $homeworks , 'categories' => $categories]);
    }

    //MOSTRAR UNA INFORMACION EN ESPECIFICO
    public function show($id){
        $homework = Homework::find($id); //Find busca en la tabla el campo especifico.
        return view('layout.show' ,  ['homework' => $homework]);
    }

    //ACTUALIAR LA INFORMACION POR MEDIO DE LA ID
    public function update( Request $request , $id){
        
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $homework = Homework::find($id);
        //Obenemos por el request la informacion que proviene del formulario y lo agramos en en la base de datos
        $homework->title = $request->title;
        $homework->save(); //Guarda la informacion de la base de datos
        return redirect()->route('show-task')->with('success' , 'Tarea actualizada correctamente'); //Retornamos a la vista
    }

    //Eliminar un elemento de la base de dato
    public function destroy($id){
        $homework = Homework::find($id);
        $homework->delete(); //Elimana desde la base de dato
        return redirect()->route('show-task')->with('success' , 'Tarea eliminada correctamente'); //Retornamos a la vista
    }


}
