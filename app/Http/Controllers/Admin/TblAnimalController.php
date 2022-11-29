<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblAnimal\BulkDestroyTblAnimal;
use App\Http\Requests\Admin\TblAnimal\DestroyTblAnimal;
use App\Http\Requests\Admin\TblAnimal\IndexTblAnimal;
use App\Http\Requests\Admin\TblAnimal\StoreTblAnimal;
use App\Http\Requests\Admin\TblAnimal\UpdateTblAnimal;
use App\Models\TblAnimal;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\TblTipoAnimal;

class TblAnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblAnimal $request
     * @return array|Factory|View
     */
    public function index(IndexTblAnimal $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblAnimal::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'id_tipo_animal'],

            // set columns to searchIn
            ['id', 'nombre', 'tbl_tipo_animal.nombre'],

            function ($query) use ($request) {
                $query->with(['TipoAnimal']);
                // add this line if you want to search by author attributes
                // $query->join('tbl_tipo_animal', 'tbl_tipo_animal.id', '=', 'tbl_animal.id_tipo_animal');

                // if($request->has('TipoAnimal')){
                    // $query->whereIn('id_tipo_animal', $request->get('TipoAnimals'));
                // }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-animal.index', ['data' => $data, 'tipos_animal'=> TblTipoAnimal::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-animal.create');

        return view('admin.tbl-animal.create', ['tipos_animal'=> TblTipoAnimal::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblAnimal $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblAnimal $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_tipo_animal'] = $sanitized['id_tipo_animal']['key'];

        // Store the TblAnimal
        $tblAnimal = TblAnimal::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-animals'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-animals');
    }

    /**
     * Display the specified resource.
     *
     * @param TblAnimal $tblAnimal
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblAnimal $tblAnimal)
    {
        $this->authorize('admin.tbl-animal.show', $tblAnimal);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblAnimal $tblAnimal
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblAnimal $tblAnimal)
    {
        $this->authorize('admin.tbl-animal.edit', $tblAnimal);


        return view('admin.tbl-animal.edit', [
            'tblAnimal' => $tblAnimal,
            'tipos_animal'=> TblTipoAnimal::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblAnimal $request
     * @param TblAnimal $tblAnimal
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblAnimal $request, TblAnimal $tblAnimal)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_tipo_animal'] = $sanitized['id_tipo_animal']['key'];


        // Update changed values TblAnimal
        $tblAnimal->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-animals'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblAnimal $request
     * @param TblAnimal $tblAnimal
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblAnimal $request, TblAnimal $tblAnimal)
    {
        $tblAnimal->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblAnimal $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblAnimal $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblAnimal::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
