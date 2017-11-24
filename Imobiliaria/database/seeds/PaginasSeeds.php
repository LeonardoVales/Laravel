<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $existe = Pagina::where('tipo', '=', 'sobre')->count();

        if ($existe) {

            $paginaSobre = Pagina::where('tipo', '=', 'sobre')->first();

        } else {

            $paginaSobre = new Pagina();

        }

        //$paginaSobre = new Pagina();
        $paginaSobre->titulo    = "Nome da Empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa";
        $paginaSobre->texto     = "Texto sobre a empresa";
        $paginaSobre->imagem    = "img/modelo_img_home.jpg";
        $paginaSobre->mapa      = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d278.8383942217609!2d-43.92982528030321!3d-19.89964127374033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb2e149d52d7be88f!2sIgreja+Presbiteriana+Redentor!5e0!3m2!1spt-BR!2sbr!4v1498793625453" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo      = "sobre";
        $paginaSobre->save();


        $existe = Pagina::where('tipo', '=', 'contato')->count();

        if ($existe) {

            $paginaContato = Pagina::where('tipo', '=', 'contato')->first();

        } else {

            $paginaContato = new Pagina();

        }

        //$paginaSobre = new Pagina();
        $paginaContato->titulo    = "Entre em Contato";
        $paginaContato->descricao = "Preencha o formulário de contato.";
        $paginaContato->texto     = "Contato";
        $paginaContato->imagem    = "img/modelo_img_home.jpg";
        $paginaContato->email     = "leohenrique.vales@gmail.com";
        $paginaContato->tipo      = "contato";
        $paginaContato->save();

    }
}
