<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Item - PHP FINAL ASSIGNMENT</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div id="header">
            <center>
                <h2 class="page-header">Add Item</h2>
                <hr />
            </center>
            <a href="{!! url('/') !!}"><i class="fa fa-plus-circle"></i>&nbsp;Back</a>&nbsp;&nbsp;
        </div>
        <!-- Display error -->
        @if($errors->any())
        <div class="row">
            <div class="col-md-4"></div>
            <div class="alert alert-danger col-md-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <!-- //Display error -->
        <!-- Form Add Item -->
        <form method="post" action="{{ URL::action('ItemController@postDataAddItem') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="Enter Title..." name="txttitle">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" placeholder="Enter description..." name="txtdescription">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" placeholder="Enter link..." name="txtlink">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" placeholder="Enter category..." name="txtcategory">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="comments">Comments:</label>
                    <input type="text" class="form-control" placeholder="Enter comments..." name="txtcomments">
                </div>
            </div>

            <!-- button add -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" style="margin-left: 15px">Add Product</button>
                </div>
            </div>
            <!-- /butto add -->
        </form>
        <!-- Form Add Item -->
    </div><!-- /.container -->

    <!-- Javacsript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- /Javacsript -->
</body>

</html>