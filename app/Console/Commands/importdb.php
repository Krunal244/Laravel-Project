<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class importdb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importdb:sql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $menu_data = DB::table('menu')->get();
        if(count($menu_data) > 0){
            $cat_id;
            foreach ($menu_data as $menu){
                $menu_id = $menu->MenuId;
                $category_data = DB::table('Categori')->where('MenuID',$menu_id)->get();
                if(count($category_data) > 0) {
                    foreach ($category_data as $category){
                        $category_id = DB::table('st_category')->insertGetId(
                           array(
                               'name'=> $menu->MenuName.'-'.$category->CatName1,
                               'label_en'=>$category->CatName1,
                               'label_es'=>$category->CatName2,
                               'label_pt'=>$category->CatName3,
                               'label_da'=>$category->CatName4,
                               'label_de'=>$category->CatName5,
                               'label_it'=>$category->CatName6,
                               'label_pl'=>$category->CatName7,
                               'label_sl'=>$category->CatName8,
                               'label_fi'=>$category->CatName9,
                               'label_no'=>$category->CatName10
                            ));
                        $cat_id = $category_id;
                        if($category_id > 0) {
                            $sub_category_data = DB::table('SubCategori')
                                                ->where('CatId',$category->id)
                                                ->where('MenuId',$menu_id)
                                                ->get();
                            if(count($sub_category_data) > 0) {
                                foreach ($sub_category_data as $sub_category){
                                    $category_id = DB::table('st_category')->insertGetId(
                                        array(
                                            'parent_id'=> $cat_id,
                                            'name'=> $sub_category->SubCatName1,
                                            'label_en'=>$sub_category->SubCatName1,
                                            'label_es'=>$sub_category->SubCatName2,
                                            'label_pt'=>$sub_category->SubCatName3,
                                            'label_da'=>$sub_category->SubCatName4,
                                            'label_de'=>$sub_category->SubCatName5,
                                            'label_it'=>$sub_category->SubCatName6,
                                            'label_pl'=>$sub_category->SubCatName7,
                                            'label_sl'=>$sub_category->SubCatName8,
                                            'label_fi'=>$sub_category->SubCatName9,
                                            'label_no'=>$sub_category->SubCatName10
                                        ));
                                }
                            }
                        }
                       
                    }
                }
            }
        }
        $bar->advance();
        $bar->finish();
    }
}
