<!DOCTYPE html>
<html lang="en">
    @include('crm.layouts.head')
    @yield('add_on_styles')
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            @include('crm.layouts.sidemenu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            @include('crm.layouts.script')

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    @include('crm.layouts.topbar')
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    @yield('content')
                    <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <script>document.write(new Date().getFullYear())</script> --}}
                                {{ $copyrights }}
                            </div>
                            <div class="col-md-6">
                                {{-- <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div> --}}
                                
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper --> 
        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Notification</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar id="notification_tab">

                @include('crm.layouts._notification')

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->
      
        @yield('add_on_script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script>
            $( document ).ready(function() {
                $(".show_confirm").click(function(event){
                    var form =  $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    swal({
                        text: `Are you sure you want to delete ?`,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
                });
            }); 
        </script>

        <div class="modal fade show" id="Mymodal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
            <!-- /.modal-dialog -->
        </div>
    </body>
</html>
    