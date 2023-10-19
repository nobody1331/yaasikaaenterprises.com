<?php

include('../middleware/adminMiddleware.php');

// Include the mPDF library
require_once 'includes/mpdf/vendor/autoload.php';

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);

    if (mysqli_num_rows($orderData) < 1) {
        echo '<h4>Invalid Tracking Number</h4>';
        exit();
    }

    $data = mysqli_fetch_array($orderData);

    // Create a new mPDF instance
    $mpdf = new \Mpdf\Mpdf();

    // Start the PDF document
    $mpdf->SetHeader('Invoice');

    $mpdf->WriteHTML('<h2 style="text-align: center;color:#9f4103;">Tax Invoice</h2>');
    $mpdf->SetFooter('Thank You for shopping with Yaasikaa Enterprises');

    // Generate the HTML content for the invoice
    $html = '
    <div class="vo2">
        <div class="container">
            <div class="card card-body shadow">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Name</th>
                                                <td style="text-align: left;">' . $data['name'] . '</td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Tracking No.</th>
                                                <td style="text-align: left;">' . $data['tracking_no'] . '</td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Phone Number</th>
                                                <td style="text-align: left;">' . $data['phone'] . '</td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Address</th>
                                                <td style="text-align: left;">' . $data['address'] . '</td>
                                            </tr>
                                             <tr>
                                                <th style="font-weight: bold; text-align: left;">Payment Mode</th>
                                                <td style="text-align: left;">' . $data['payment_mode'] . '</td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Payment Status</th>
                                                <td style="text-align: left;">' . $data['payment_status'] . '</td>
                                            </tr>
                                            <tr>
                                                <th style="font-weight: bold; text-align: left;">Payment Ref Number</th>
                                                <td style="text-align: left;">' . $data['payment_ref_no'] . '</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>';


    $html .= '
        <div class="col-md-12">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 5px;">Product</th>
                        <th style="border: 1px solid #000; padding: 5px;">Quantity</th>
                        <th style="border: 1px solid #000; padding: 5px;">Price</th>
                    </tr>
                </thead>
                <tbody>';

    $userId = $_SESSION['auth_user']['user_id'];

    $order_query = "SELECT o.id as oid,o.tracking_no,o.user_id,oi.*,oi.qty as orderqty,p.* FROM orders o,order_items oi,
    products p WHERE  oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";

    $order_query_run = mysqli_query($con, $order_query);

    if (mysqli_num_rows($order_query_run) > 0) {
        foreach ($order_query_run as $item) {
            $html .= '
                    <tr>
                        <td style="border: 1px solid #000; padding: 5px;text-align: left;" class="align-middle">' . $item['name'] . '</td>
                        <td style="border: 1px solid #000; padding: 5px;text-align: right;" class="align-middle">x ' . $item['orderqty'] . '</td>
                        <td style="border: 1px solid #000; padding: 5px;text-align: right;" class="align-middle">' . $item['price'] . '.00</td>
                    </tr>';
        }
    }

    $html .= '
                </tbody>
            </table>
            <h2 style="text-align: right;color: blue;">Total Price: <span class="float-end fw-bold">' . $data['total_price'] . '</span></h2>
            <hr>
           
            <h5 style="color: red;">**Inclusive Of All Taxes**</h5>
        </div>';



    // Add the HTML content to the PDF
    $mpdf->WriteHTML($html);

    // Output the PDF as a download
    $mpdf->Output('Invoice.pdf', 'D');
} else {
    echo '<h4>Invalid Tracking Number</h4>';
}
