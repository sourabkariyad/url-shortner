@extends('layouts.main')

@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">URL SHORTNER</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="form-inline">
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="url-title" name="title" placeholder="Title" required>
                  </div>
                  <div class="form-group mx-sm-3 mb-2 ">
                    <input type="text" style="width:650px" class="form-control" id="long-url" name="url" placeholder="URL" required>
                  </div>

                  <button type="submit" class="btn btn-primary mb-2" id="short-url">Short</button>
                </div>
              </div>
            </div><!-- /.card -->

          </div>

          <div class="card card-primary card-outline">
              <div class="card-body" id="table-sec">
                  @include('url-table')
              </div>
            </div><!-- /.card -->
          </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection