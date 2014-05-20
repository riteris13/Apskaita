<?php
class InvoiceController extends BaseController {
    public function getIndex(){
        return View::make('invoice.invoice');
    }
}