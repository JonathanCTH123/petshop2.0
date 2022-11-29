<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TblTipoAnimal\BulkDestroyTblTipoAnimal;
use App\Http\Requests\Admin\TblTipoAnimal\DestroyTblTipoAnimal;
use App\Http\Requests\Admin\TblTipoAnimal\IndexTblTipoAnimal;
use App\Http\Requests\Admin\TblTipoAnimal\StoreTblTipoAnimal;
use App\Http\Requests\Admin\TblTipoAnimal\UpdateTblTipoAnimal;
use App\Models\TblTipoAnimal;
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

class TblTipoAnimalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTblTipoAnimal $request
     * @return array|Factory|View
     */
    public function index(IndexTblTipoAnimal $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TblTipoAnimal::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nombre', 'habilitado'],

            // set columns to searchIn
            ['nombre']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tbl-tipo-animal.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tbl-tipo-animal.create');

        return view('admin.tbl-tipo-animal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTblTipoAnimal $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTblTipoAnimal $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TblTipoAnimal
        $tblTipoAnimal = TblTipoAnimal::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tbl-tipo-animals'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tbl-tipo-animals');
    }

    /**
     * Display the specified resource.
     *
     * @param TblTipoAnimal $tblTipoAnimal
     * @throws AuthorizationException
     * @return void
     */
    public function show(TblTipoAnimal $tblTipoAnimal)
    {
        $this->authorize('admin.tbl-tipo-animal.show', $tblTipoAnimal);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TblTipoAnimal $tblTipoAnimal
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TblTipoAnimal $tblTipoAnimal)
    {
        $this->authorize('admin.tbl-tipo-animal.edit', $tblTipoAnimal);


        return view('admin.tbl-tipo-animal.edit', [
            'tblTipoAnimal' => $tblTipoAnimal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTblTipoAnimal $request
     * @param TblTipoAnimal $tblTipoAnimal
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTblTipoAnimal $request, TblTipoAnimal $tblTipoAnimal)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TblTipoAnimal
        $tblTipoAnimal->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tbl-tipo-animals'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tbl-tipo-animals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTblTipoAnimal $request
     * @param TblTipoAnimal $tblTipoAnimal
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTblTipoAnimal $request, TblTipoAnimal $tblTipoAnimal)
    {
        $tblTipoAnimal->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTblTipoAnimal $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTblTipoAnimal $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    TblTipoAnimal::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
