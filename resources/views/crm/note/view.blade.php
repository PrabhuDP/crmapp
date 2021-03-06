<div class="modal-dialog modal-md">
    
    <div class="modal-content h-100">
        <div class="modal-header px-3" id="myLargeModalLabel">
            <h4>{{ $modal_title }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 95vh;overflow:auto">

                <div class="modal-body d-flex justify-content-center align-items-center h-100 p-3">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12" id="error"></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="">Notes</label>
                                <div>
                                    {{ $info->notes ?? '' }}
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            
                            @if(isset( $info->customer->first_name ) && !empty($info->customer->first_name))
                            <div class="col-6 mt-2">
                                <label for="">Customer</label>
                                <div>
                                    {{ $info->customer->first_name ?? 'N/A' }}
                                </div>
                            </div>
                            @endif
                            @if(isset( $info->user->name ) && !empty($info->user->name))
                            <div class="col-6 mt-2">
                                <label for="">User</label>
                                <div>
                                    {{ $info->user->name ?? 'N/A' }}
                                </div>
                            </div>
                            @endif
                            @if(isset( $info->lead->lead_subject ) && !empty($info->lead->lead_subject))
                            <div class="col-6 mt-2">
                                <label for="">Lead</label>
                                <div>
                                    {{ $info->lead->lead_subject ?? 'N/A' }}
                                </div>
                            </div>
                            @endif
                            @if(isset( $info->deal->deal_title ) && !empty($info->deal->deal_title))
                            <div class="col-6 mt-2">
                                <label for="">Deal</label>
                                <div>
                                    {{ $info->deal->deal_title ?? 'N/A' }}
                                </div>
                            </div>
                            @endif
                        </div>
                        
                            
                            <div class="col-md-12 mt-2 text-end">
                                <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal" aria-label="Close"> Close</button>
                            </div>
                        </div>  
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div>
