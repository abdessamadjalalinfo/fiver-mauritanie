<?php

namespace App\Http\Controllers;
use App\Models\Rdv;
use App\Models\User;
use App\Models\Dossier;
use App\Models\Mariage;
use App\Models\Naissance;
use App\Models\Divorce;
use App\Models\Dece;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function gestion_rdvs()
    {
        $rdvs=Rdv::all();
       
        return view('gestion_rdvs',['rdvs'=>$rdvs]);

    }
    
    public function gestion_dossiers()
    {
        $dossiers=Dossier::all();
       
        return view('gestion_dossiers',['dossiers'=>$dossiers]);

    }
    public function modifier_dossier(Request $request)
    {
         $dossier=Dossier::find($request->id);
   
             $dossier->etat=$request->etat;
             $dossier->save();
        
       
        return redirect()->back();
    }
    public function modifier_rendez_vous($id)
    {
        $rdv=Rdv::find($id);
        if($rdv->etat=="oui"){
            $rdv->etat="non";
            $rdv->save();
        }
        else{
            $rdv->etat="oui";
            $rdv->save();
        }
        return redirect()->back();
    }

    public function gestion_actes()
    {
        $actes_naissances=Naissance::all();
        $actes_divorces=Divorce::all();
        $actes_mariages=Mariage::all();
        $actes_deces=Dece::all();
        return view('gestion_actes',['actes_naissances'=>$actes_naissances,'actes_divorces'=>$actes_divorces,'actes_mariages'=>$actes_mariages,'actes_deces'=>$actes_deces]);

    }
    public function creer_mariage(Request $request)
    {
        $mariage=new Mariage();
        $mariage->date_mariage=$request->date;
        $mariage->lieu_mariage=$request->lieu;
        $mariage->homme_id=$request->homme;
        $mariage->femme_id=$request->femme;
        
         if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $mariage->path=$fileName;
           
             $mariage->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }

        
        return redirect()->back();
    }
    public function creer_divorce(Request $request)
    {
        $divorce=new Divorce();
        $divorce->date_divorce=$request->date;
        $divorce->lieu_divorce=$request->lieu;
        $divorce->homme_id=$request->homme;
        $divorce->femme_id=$request->femme;
       if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $divorce->path=$fileName;
             $divorce->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
       
        return redirect()->back();
    }

    public function creer_deces(Request $request)
    {
        $dece=new Dece();
        $dece->citoyen_id=$request->id;
         if($request->file()) {
            
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $dece->path=$fileName;
           
             $dece->save();
            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
       
        return redirect()->back();

    }


    public function gestion_registes()
    {
        $citoyens=User::all()->where('type',"=","citoyen");
        return view('gestion_registes',['citoyens'=>$citoyens]);
    }

    public function creer_citoyen(Request $request)
    {
         $agent=new User();
        $agent->email=$request->email;
        $agent->nom=$request->nom;
        $agent->prenom=$request->prenom;
        $agent->type='citoyen';
        $agent->password=Hash::make($request->password);
        $agent->name=$request->nom.$request->prenom;
        $agent->date_naissance=$request->date_naissance;
        $agent->lieu_naissance=$request->lieu_naissance;
        $agent->sexe=$request->sexe;
        $agent->nationalite=$request->natio;
        $agent->save();
        return redirect()->back();
    }


    public function statistiques()
    {
        $users=User::all()->where('type','citoyen')->count();
        $mariage=Mariage::all()->count();
        $dece=Dece::all()->count();
        $divorce=Divorce::all()->count();
        $dossiers=Dossier::all()->count();
       return view('statistique',['users'=>$users,'mariage'=>$mariage,'dece'=>$dece,'divorce'=>$divorce,'dossiers'=>$dossiers]);
    }
}
