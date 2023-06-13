<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesReport extends Controller
{
    public function SalesReport()
    {
        $date = date('d/m/y');
        $total_sales = DB::table('orders')->where('order_date', $date)->sum('total');
        $total_pay = DB::table('orders')->where('order_date', $date)->sum('pay');
        $total_due = DB::table('orders')->where('order_date', $date)->sum('due');

        $sales_report = DB::table('orders')
                        ->join('customers', 'orders.customer_id', 'customers.id')
                        ->select('customers.name', 'orders.*')
                        ->where('order_date', $date)
                        ->get();
        return view('project.salesreport.today_salesreport', compact('sales_report', 'total_sales', 'total_pay', 'total_due'));
        // return $sales_report;
    }

    public function AllSalesReport()
    {
        $sales_report = DB::table('orders')
                       ->join('customers', 'orders.customer_id', 'customers.id')
                       ->select('customers.name', 'orders.*')
                       ->get();

         $total_sales = DB::table('orders')->sum('total');
         $total_pay = DB::table('orders')->sum('pay');
         $total_due = DB::table('orders')->sum('due');
        
        return view('project.salesreport.all_sale_report', compact('sales_report', 'total_sales', 'total_pay', 'total_due'));    
    }
    public function DateSalesReport(Request $request)
    {
       $date = $request->date;
       $explode = explode('-', $date);
       $year = $explode[0];
       $yr = substr($year, -2);
       $month = $explode[1];
       $day = $explode[2];
       $format_date ="$day/$month/$yr";
       
       $sales_report = DB::table('orders')
                       ->join('customers', 'orders.customer_id', 'customers.id')
                       ->select('customers.name', 'orders.*')
                       ->where('order_date', $format_date)
                       ->get();
     
        $total_sales = DB::table('orders')->where('order_date', $format_date)->sum('total');
        $total_pay = DB::table('orders')->where('order_date', $format_date)->sum('pay');
        $total_due = DB::table('orders')->where('order_date', $format_date)->sum('due');
        return view('project.salesreport.all_sale_report', compact('sales_report', 'total_sales', 'total_pay', 'total_due'));        
    }
}
