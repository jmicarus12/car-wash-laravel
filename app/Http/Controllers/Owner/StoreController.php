<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Services\StoreService;
Use Auth;

/**
 * Class StoreController.
 */
class StoreController
{

    /** @var StoreService $storeService */
    protected $storeService;

    /**
     * StoreController constructor.
     * @param StoreService $storeService
     */
    public function __construct(StoreService $storeService){
        $this->storeService = $storeService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Check if the owner already setup its store
        if(!Auth::user()->store) {
            return redirect(route('owner.store.edit'));
        }

        $store = Auth::user()->store;

        return view('owner.store.index', compact('store'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $store = Auth::user()->store;

        return view('owner.store.edit', compact('store'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => ['nullable'],
            'store_name' => ['required', 'max:255'],
            'longitude' => ['required', 'max:255'],
            'latitude' => ['required', 'max:255'],
            'avatar'   => ['nullable']
        ], [
            'store_name.required' => 'Store name is required'
        ]);
        
        $data = $request->all();

        if($data['id']) {
            $this->storeService->update($data);
        }
        else {
            $this->storeService->store($data);
        }

        return redirect()->route('owner.store.index')->withFlashSuccess(__('Store successfully updated.'));
    }
}
