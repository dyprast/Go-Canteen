<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kantin;
use App\Menu;
use Illuminate\Support\Facades\Auth;

class KantinController extends Controller
{
    public function index()
    {
        return view('app.kantin.index');
    }

    public function menu_index()
    {
        return view('app.menu.index');
    }

    public function add()
    {
    	return view('app.kantin.add');
    }

    public function menu_add()
    {
    	return view('app.menu.add');
    }

    public function save(Request $r)
    {
    	$kantin = new Kantin();
    	$kantin->nama_kantin = $r->nama_kantin;
    	$kantin->penjaga1 = $r->penjaga1;
    	$kantin->penjaga2 = $r->penjaga2;
    	$kantin->penjaga3 = $r->penjaga3;
    	$kantin->id_user = Auth::user()->id;
    	$kantin->save();

    	return redirect()->back();
    }

    public function menu_save(Request $r)
    {
    	$menu = new Menu();
    	$menu->nama = $r->nama;
    	$menu->kategori = $r->kategori;
    	$menu->stok = $r->stok;
    	$menu->harga = $r->harga;
    	$menu->id_kantin = $r->id_kantin;

    	$gambar = $r->file('gambar');
    	$filename = $gambar->getClientOriginalName();
    	$r->file('gambar')->move('gambar/', $filename);
    	$menu->gambar = $filename;
    	$menu->save();

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$kantin = Kantin::find($id);

    	return view('app.kantin.edit')->with('kantin', $kantin);
    }

    public function menu_edit($id)
    {
    	$menu = Menu::find($id);

    	return view('app.menu.edit')->with('menu', $menu);
    }

    public function update(Request $r, $id)
    {
    	$kantin = Kantin::find($id);
    	$kantin->nama_kantin = $r->nama_kantin;
    	$kantin->penjaga1 = $r->penjaga1;
    	$kantin->penjaga2 = $r->penjaga2;
    	$kantin->penjaga3 = $r->penjaga3;
    	$kantin->id_user = Auth::user()->id;
    	$kantin->save();

    	return redirect()->back();
    }

    public function menu_update(Request $r, $id)
    {
    	$menu = Menu::find($id);
    	$menu->nama = $r->nama;
    	$menu->kategori = $r->kategori;
    	$menu->stok = $r->stok;
    	$menu->harga = $r->harga;
    	$menu->id_kantin = $r->id_kantin;

    	if ($r->hasFile('gambar')) {
    	$gambar = $r->file('gambar');
    	$filename = $gambar->getClientOriginalName();
    	$r->file('gambar')->move('gambar/', $filename);
    	$menu->gambar = $filename;
    	}

    	$menu->save();

    	return redirect()->back();
    }

    public function delete($id)
    {
    	$kantin = Kantin::find($id);
    	$kantin->delete();

    	return redirect()->back();
    }

    public function menu_delete($id)
    {
    	$menu = Menu::find($id);
    	$menu->delete();

    	return redirect()->back();
    }
}
