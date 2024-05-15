<?php

namespace App\Controller;

use App\Utils\View;

abstract class Page
{
    /** 
     * Método responsável por renderizar o cabeçalho da página
    */
    private static function getHeader(): string 
    {
        return View::render('layout/header');
    }
    
    /** 
     * Método responsável por renderizar o rodapé da página
    */
    private static function getFooter(): string 
    {
        return View::render('layout/footer');
    }

    /** 
     * Método responsável por renderizar o conteúdo da página
    */
    public static function getPage(array $data): string 
    {
        $data['header'] = self::getHeader();
        $data['footer'] = self::getFooter();
        return View::render('layout/page', $data);
    }
}
