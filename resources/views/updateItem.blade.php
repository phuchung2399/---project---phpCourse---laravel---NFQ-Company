<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Item - PHP FINAL ASSIGNMENT</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div id="header">
            <center>
                <h2 class="page-header">Update Item</h2>
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
        <!-- /Display error -->
        <!-- Form Update Item -->
        <form method="post" action="{{URL::action('ItemController@postDataUpdateItem',$item->id)}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="Enter Title..." name="txttitle" value="{!! old ('txttitle',isset($item)?htmlentities($item['title']):NULL) !!}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" placeholder="Enter description..." name="txtdescription" value="{!! old ('txtdescription',isset($item)?htmlentities($item['description']):NULL) !!}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" placeholder="Enter link..." name="txtlink" value="{!! old ('txtlink',isset($item)?htmlentities($item['link']):NULL) !!}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" placeholder="Enter category..." name="txtcategory" value="{!! old ('txtcategory',isset($item)?htmlentities($item['category']):NULL) !!}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="comments">Comments:</label>
                    <input type="text" class="form-control" placeholder="Enter comments..." name="txtcomments" value="{!! old ('txtcomments',isset($item)?htmlentities($item['comments']):NULL) !!}">
                </div>
            </div>
            <!-- button update -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" style="margin-left: 15px">Add Product</button>
                </div>
            </div>
            <!-- /butto update -->
        </form>
        <!-- /Form Update Item -->

    </div><!-- /.container -->

    <!-- Javacsript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- /Javacsript -->
</body>

</html>