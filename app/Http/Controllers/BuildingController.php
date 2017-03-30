<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('website.building.index', compact('buildings'));
    }

    public function showRent()
    {
        $buildings = Building::where('status', 1)
            ->where('rent', 1)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('website.building.index', compact('buildings'));
    }

    public function showSell()
    {
        $buildings = Building::where('status', 1)
            ->where('rent', 0)
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('website.building.index', compact('buildings'));
    }

    public function byType($id)
    {

        if (in_array($id, ['0', '1', '2'])) {
            $buildings = Building::where('status', 1)
                ->where('type', $id)
                ->orderBy('id', 'desc')
                ->paginate(15);

            return view('website.building.index', compact('buildings'));
        } else {
            abort(404);
        }
    }

    public function search(Request $request)
    {
        $query = Building::where('status', 1);
        $search = [];
        foreach ($request->except(['_token', 'page']) as $key => $val) {
            if ($val != null) {
                if ($key == 'price_from') {
                    $query->where('price', '>=', $val);
                } elseif ($key == 'price_to') {
                    $query->where('price', '<=', $val);
                } else {
                    $query->where($key, $val);
                }
                $search[$key] = $val;
            }
        }

        $buildings = $query
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('website.building.index', compact('buildings', 'search'));
    }
}
