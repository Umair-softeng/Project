@extends('layouts/contentLayoutMaster')

@section('title', 'Text Show')

@section('content')
    <div class="content-wrapper mt-1">
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Text Show</h4>
                                <div class="info-container">
                                    <p>
                                        {!! $textEditor->text !!}
                                    </p>
                                    @can('text_create')
                                        <div class="d-flex justify-content-center pt-2">
                                            <form method="post" action="{{route('textEditor.destroy',$textEditor->textID)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-primary suspend-user waves-effect">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->
                </div>
            </section>
        </div>
    </div>
@endsection


