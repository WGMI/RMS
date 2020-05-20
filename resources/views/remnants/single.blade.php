<!--Modal: modalPush-->
              <div class="modal fade" id="singleProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-notify modal-info" role="document">
                  <!--Content-->
                  <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                      <p class="heading">Be always up to date</p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <img src="img/food/{{$product->image}}.jpg" class="img-fluid" alt="product">

                      <p>Do you want to receive the push notification about the newest posts?</p>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                      <a href="https://mdbootstrap.com/products/jquery-ui-kit/" class="btn btn-info">Yes</a>
                      <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal: modalPush-->