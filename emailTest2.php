<?php
$to = "ravneetsngh6@gmail.com, ravneet@avenview.com";
$subject = "HTML email";

$emailReceipt = '<div dir="ltr">
  <div dir="ltr">
    <div dir="ltr">
      <div dir="ltr">
        <div dir="ltr">
          <div dir="ltr">
            <div dir="ltr">
              <div dir="ltr">
                <div dir="ltr">
                  <div dir="ltr">
                    <table border="0" style="color: rgb(0, 0, 0); font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; width: 700px; margin-left: auto; margin-right: auto; border: none;">
                      <tbody>
                        <tr id="gmail-BannerRow" style="background-color: rgb(60, 60, 60); color: rgb(255, 255, 255);">
                          <td id="gmail-BannerCol" height="82" valign="middle" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-color: rgb(216, 216, 216); padding-left: 20px;">
                            <h1 style="text-align: center; font-weight: normal; padding-left: 20px; padding-right: 20px;">
                              <div>
                                <img src="https://www.avenview.com/purchase/avenview.png" width="263" height="85" style="margin-right: 5px;"> 
                                <br>
                              </div>
                            </h1>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td style="padding-bottom: 10px;">
                            <div id="gmail-bodyHtml" style="line-height: 24px; margin: 0px; padding: 40px 0px 0px;">
                              <p style="margin-bottom: 25px;">
                                <span class="gmail-email-title">
                                  <b>Thank you for your purchase. Here are the order details.</b>
                                </span>
                              </p>
                              <table style="border: none; border-collapse: collapse; width: 694.4px; margin-top: 30px;">
                                <tbody>
                                  <tr style="border-color: rgb(216, 216, 216); padding-top: 5px; padding-bottom: 5px; height: 33px;">
                                    <td width="6" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td class="gmail-tableheader" width="50%" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Order Summary</strong>
                                      </font>
                                    </td>
                                    <td width="2" style="font-size: 13px;"></td>
                                    <td id="gmail-cpBodyHtml_ctl38_tdOrderInformationHtmlPrefix" width="6" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td id="gmail-cpBodyHtml_ctl38_tdOrderInformationHtml" class="gmail-tableheader" style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Order Information</strong>
                                      </font>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216); vertical-align: text-top;">
                                    <td></td>
                                    <td style="line-height: 24px;">
                                      <table style="width: 344.8px;">
                                        <tbody>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Order Number:</td>
                                            <td nowrap="" style="vertical-align: text-top;">'.$_GET['id'].'</td>
                                          </tr>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Date Ordered:</td>
                                            <td>'.date("Y/m/d") . " " .date("h:i:sa") ." GMT".' 
                                              <br>
                                              <span class="gmail-SmallLightText"></span>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td style="line-height: 24px;">
                                      <table>
                                        <tbody>
                                          <tr>
                                            <td nowrap="" style="vertical-align: text-top;">Email:</td>
                                            <td style="vertical-align: text-top;">'.$_GET['email'].'</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="color: rgb(115, 115, 115); font-size: 14px; line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                    <td width="2" class="gmail-tableheader" style="line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);"></td>
                                    <td colspan="4" class="gmail-tableheader" style="line-height: 20px; padding-bottom: 10px; border-bottom: 1px solid rgb(115, 115, 115);">
                                      <font color="#636363">
                                        <strong>Items</strong>
                                      </font>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" style="font-size: 13px;">
                                      <table class="gmail-fullwidth-table" style="border: 0px; border-collapse: collapse; width: 692px;">
                                        <tbody>
                                          <tr style="border-color: rgb(216, 216, 216);">
                                            <td></td>
                                            <td></td>
                                            <td class="gmail-center-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: center; vertical-align: text-top;">
                                              <strong></strong>
                                            </td>
                                            <td class="gmail-right-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: right; vertical-align: text-top;">
                                              <strong></strong>
                                            </td>
                                            <td class="gmail-right-text" style="width: 93.2px; padding-left: 4px; padding-right: 6px; text-align: right; vertical-align: text-top;">
                                              <strong>Amount</strong>
                                            </td>
                                          </tr>
                                          <tr style="border-left-color: rgb(216, 216, 216); border-right-color: rgb(216, 216, 216); border-top-color: rgb(216, 216, 216);">
                                            <td class="gmail-productlink" colspan="2" style="vertical-align: text-top; overflow: hidden;">
                                              <strong>
                                                <span dir="ltr">'.
												$productNamesHTML
												.'
                                                </span>
                                              </strong>
                                            </td>
                                            <td class="gmail-center-text" style="width: 101.2px; text-align: center; vertical-align: text-top;">&nbsp;</td>
                                            <td class="gmail-right-text" style="width: 101.2px; text-align: right; vertical-align: text-top;"></td>
                                            <td class="gmail-right-text" style="width: 101.2px; text-align: right; vertical-align: text-top;">
											'.
											$productPricesHTML
											.'
                                            </td>
                                          </tr>
                                          <tr style="border-color: rgb(216, 216, 216);">
                                            <td colspan="2"></td>
                                            <td colspan="3">
                                              <table class="gmail-fullwidth-table gmail-totals-table" style="border-width: 2px 0px 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; border-collapse: collapse; width: 307.2px; text-align: right; line-height: 23px; border-top-color: rgb(153, 153, 153); border-top-style: solid; word-break: keep-all;">
                                                <tbody>
                                                  <tr style="border-top: 1px solid rgb(216, 216, 216);">
                                                    <td width="120"></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Shipping:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" style="padding-left: 10px;">$'.$_GET['shipping'].'USD</td>
                                                  </tr>
                                                  <tr style="border-color: rgb(216, 216, 216);">
                                                    <td></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Taxes:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" nowrap="" style="padding-left: 10px;">$0.00</td>
                                                  </tr>
                                                  <tr style="border-color: rgb(216, 216, 216);">
                                                    <td></td>
                                                    <td class="gmail-right-text">
                                                      <strong>Total:</strong>
                                                    </td>
                                                    <td class="gmail-right-text" style="padding-left: 10px;">'.$_GET['totalPrice'].'</td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <br>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td height="14" style="font-size: 13px;"></td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" height="14" style="font-size: 13px;">
                                      <span class="gmail-emailLink" style="font-size: 18px;">All payment processes are done in your AVSignCloud account Billing Section.</span> 
                                      <span style="font-size: 18px;">&nbsp;</span>
                                    </td>
                                  </tr>
                                  <tr style="border-color: rgb(216, 216, 216);">
                                    <td colspan="5" height="14" style="font-size: 13px;">
                                      <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td style="padding-bottom: 15px;">
                            <span id="gmail-lblHelpLinkHtml" class="gmail-emailLink">If you have any questions, please 
                              <a href="mailto:sales@avenview.com">click here</a>&nbsp;and contact our sales department.
                            </span>
                          </td>
                        </tr>
                        <tr style="font-size: 18px; line-height: 24px;">
                          <td>
                            <span id="gmail-lblThankYouHtml" class="gmail-emailLink">Thank you.</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
';

$message = wordwrap($emailReceipt,70);

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Avenview Inc.<no-reply@avenview.com>' . "\r\n";

mail($to,$subject,$message,$headers);
?>