<?php


namespace App\Http\Controllers;
use App\Models\Rdv;
use App\Models\Dossier;
use App\Models\Naissance;
use App\Models\Mariage;
use App\Models\Divorce;
use Illuminate\Support\Facades\DB;

use Auth;
use Illuminate\Http\Request;

class CitoyenController extends Controller
{
    public function prendre_rendez_vous()
    {
        $rdvs=Rdv::all()->where('citoyen_id',"=",Auth::user()->id);
        return view('prendre_rendez_vous',['rdvs'=>$rdvs]);
    }
    public function save_rendez_vous(Request $request)
    {
        $rdv=new Rdv();
        $rdv->besoin=$request->besoin;
        $rdv->description=$request->description;
         $rdv->date_rdv=$request->date;
         $rdv->citoyen_id=Auth::user()->id;
         $rdv->save();
         return back()->with('success','Le rendez vous est pris avec success!');
    }

    public function dossiers()
    {
         $dossiers=Dossier::all()->where('citoyen_id',"=",Auth::user()->id);
        return view('dossiers',['dossiers'=>$dossiers]);
    }
    public function save_dossiers(Request $request)
    {
        if($request->acte=="naissance")
        {
            $dossier=new Dossier();
            $dossier->nom="Demande d'acte de naissance";
        }
         if($request->acte=="mariage")
        {
            $dossier=new Dossier();
            $dossier->nom="Demande d'acte de mariage";
        }
         if($request->acte=="divorce")
        {
            $dossier=new Dossier();
            $dossier->nom="Demande d'acte de divorce";
        }
         $dossier->etat="non";
            $dossier->citoyen_id=Auth::user()->id;
            $dossier->save();
         return back()->with('success','Le dossier  est enregistré avec success!');
    }

    public function acte_naissance()
    {
        $actes=Naissance::all()->where('citoyen_id',"=",Auth::user()->id);
        return view('acte_naissance',['actes'=>$actes]);
    }
     public function acte_mariage()
    {
        $actes=DB::table('mariages')->where('homme_id',"=",Auth::user()->id)->orWhere('femme_id',"=",Auth::user()->id)->get();
        return view('acte_mariage',['actes'=>$actes]);
    }
       public function acte_divorce()
    {
           $actes=DB::table('divorces')->where('homme_id',"=",Auth::user()->id)->orWhere('femme_id',"=",Auth::user()->id)->get();
        return view('acte_divorce',['actes'=>$actes]);
    }
}
