<?php
namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService{

      private $domPdf;

      public function __construct()
      {
            $this->domPdf = new DomPdf();

            $options = new Options();

            $options->set('defultFont','Garamond');

            $this->domPdf->setOptions($options);

      }

      public function showPdfFile($html){
            $this->domPdf->loadHtml($html);
            $this->domPdf->render();
            $this->domPdf->stream("details.pdf",[
                  'Attachement'=>false
            ]);
      }
      public function generateBinaryPdf($html){
            $this->domPdf->loadHtml($html);
            $this->domPdf->render();
            $this->domPdf->output();
      }
    
}