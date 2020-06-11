<?php namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use \App\Models\BookModel;

class BooksController extends Controller {

    use ResponseTrait;
    protected $format = 'json';

    public function index()
    {

    }

    /**
     * @param Request $request
     * @return JsonResponse
     * Método para mostrar detalles del libro.
     * Recibe como parámetro: ('id') id del libro a mostrar.
     * @author Gian Vespa
     */
    public function show()
    {
        $request = service('request');
        $bookModel = new BookModel($db);

        $book = $bookModel->where('id', $request->getGet('id'))->first();
        if ($book){
            return $this->respondCreated($book);
        }
        return $this->respond('aviso: libro no registrado.', 401);        
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * Método para insertar registro de libros.
     * Recibe los siguientes parámetros: ('name':string) nombre del libro,
     * ('author':string)nombre del autor del libro, 
     * ('editorial':string)nombre de la editorial del libro,
     * ('year':date) año de publicación, ('synopsis':string) sinopsis del libro.
     * @author Gian Vespa
     */
    public function create()
    {
        $request = service('request');
        $bookModel = new BookModel($db);

        $data = [
            'name'   => $request->getPost('name'),
            'author' => $request->getPost('author'),
            'editorial' => $request->getPost('editorial'),
            'year'        =>  date('Y/m/d', strtotime($request->getPost('year'))),
            'synopsis'    => $request->getPost('synopsis'),
        ];
        
        $book_id = $bookModel->insert($data);
        $book = $bookModel->where('id', $book_id)->first();
        return $this->respondCreated($book);
    }
        
    /**
     * @param Request $request
     * @return JsonResponse
     * Método para actualizar un registro.
     * Para actualizar un registro debe pasar el siguiente parámetro: ('id') id del libro,
     * y puede utilizar cualquiera de estos parámetros: ('name':string) nombre del libro,
     * ('author':string)nombre del autor del libro, 
     * ('editorial':string)nombre de la editorial del libro,
     * ('year':date) año de publicación, ('synopsis':string) sinopsis del libro.
     * @author Gian Vespa
     */
    public function update()
    {
        $request = service('request');
        $bookModel = new BookModel($db);

        $book = $bookModel->where('id', $request->getPost('id'))->first();
        if ($book){
            $bookModel->update($request->getPost('id'), $request->getPost());
            $book = $bookModel->where('id', $request->getPost('id'))->first();
            return $this->respondCreated($book);
        }
        return $this->respond('aviso: libro no registrado.', 401);
    }

    /**
     * @return JsonResponse
     * Método para eliminar un registro.
     * Recibe como parámetros: ('id') id del libro.
     * @author Gian Vespa
     */
    public function destroy()
    {
        $request = service('request');
        $bookModel = new BookModel($db);

        try {
            $book = $bookModel->where('id', $request->getPost('id'))->first();
            if ($book){
                $bookModel->delete($request->getPost('id'));
                return $this->respond('Eliminado con éxito', 200);
            }
            return $this->respond('aviso: libro no registrado.', 401);
        } catch (\Exception $e) {
            return $this->respond(['error' => $e], 401);
        }
    }

}