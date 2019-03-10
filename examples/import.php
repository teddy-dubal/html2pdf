<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 */
require_once dirname(__FILE__) . '/../vendor/autoload.php';

use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->pdf->SetDisplayMode('fullpage');

    //$html2pdf->setTemplate(dirname(__FILE__) . '/res/import.pdf');
    $html2pdf->setTemplate('https: //lae-dev.s3.amazonaws.com/tmp_file/s_1_5b95f16b0c448.pdf');
    $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim nulla quis tortor egestas imperdiet. Nunc lacinia libero elit, sit amet tincidunt orci cursus id. Duis feugiat malesuada nisi ac sodales. Maecenas aliquam lorem at diam viverra fringilla. Morbi arcu neque, malesuada nec fermentum eget, gravida non sapien. In tincidunt consectetur turpis id dapibus. Phasellus pretium lacus non quam imperdiet, eu pretium mi mattis. Integer vitae elit sit amet magna bibendum pulvinar et sit amet erat.

Sed vitae metus arcu. Nulla nec luctus lorem, vitae volutpat orci. Nam mi lorem, suscipit vel elementum id, sodales commodo tortor. Duis pulvinar congue libero, vel gravida nibh sollicitudin vel. Quisque pretium viverra placerat. Nam in risus diam. Etiam ut volutpat erat. Quisque nec sapien iaculis, molestie metus at, blandit erat.';
    $html2pdf->writeHTML($content);
    $html2pdf->Output('about.pdf');
} catch (Html2PdfException $e) {
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
