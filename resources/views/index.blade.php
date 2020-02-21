<!DOCTYPE html>
<html>

<head>
    <title>PHP FINAL ASSIGNMENT</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div>
        <div class="header">
            <center>
                <h1>Manage</h1>
            </center>
            <hr />
        </div><!-- ./header -->
        <div class="container">
            <div class="menu">
                <a href="{!! url('add-item/') !!}"><i class="fa fa-plus-circle"></i>&nbsp;Add</a>&nbsp;&nbsp;
                <div>
                    <form class="filter" method="GET">
                        <select class="form-control selection" id="exampleFormControlSelect1" name="category">
                            <option>All</option>
                            <option>MasterCard</option>
                            <option>Visa</option>
                            <option>Visa Retired</option>
                            <option>Discover Card</option>
                            <option>Computers/Software/Internet/Site Management/Content Management</option>
                        </select>
                        <input type="submit" class="btn btn-secondary button-filter" value="Filter" />
                    </form>
                </div>
                <?php
                function Filter()
                {
                    if (empty($_GET['category'])) {
                        return $_GET['category'] = 'All';
                    } else {
                        return $_GET['category'];
                    }
                }
                ?>
            </div>
            <div id="table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">LINK</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">COMMENTS</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($item) > 0)
                        @foreach($item as $value)
                        @if(Filter() == 'All')
                        <tr>
                            <td>{!! $value["id"] !!}</td>
                            <td>{!! htmlentities($value["title"]) !!}</td>
                            <td>{!! htmlentities($value["description"]) !!}</td>
                            <td>{!! htmlentities($value["link"]) !!}</td>
                            <td>{!! htmlentities($value["category"]) !!}</td>
                            <td>{!! htmlentities($value["comments"]) !!}</td>
                            <td>
                                <a href='{!! url("update-item/"),"/",$value["id"] !!}'><i class="fa fa-pencil"></i>&nbsp;Update</a>&nbsp;&nbsp;
                                <a href='{!! url("delete-item/"),"/",$value["id"] !!}'><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                        @endif
                        @if(Filter() == htmlentities($value["category"]))
                        <tr>
                            <td>{!! $value["id"] !!}</td>
                            <td>{!! htmlentities($value["title"]) !!}</td>
                            <td>{!! htmlentities($value["description"]) !!}</td>
                            <td>{!! htmlentities($value["link"]) !!}</td>
                            <td>{!! htmlentities($value["category"]) !!}</td>
                            <td>{!! htmlentities($value["comments"]) !!}</td>
                            <td>
                                <a href='{!! url("update-item/"),"/",$value["id"] !!}'><i class="fa fa-pencil"></i>&nbsp;Update</a>&nbsp;&nbsp;
                                <a href='{!! url("delete-item/"),"/",$value["id"] !!}'><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">Empty Data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="row">{{$item->links()}}</div>
            </div><!-- /.table -->
        </div><!-- /.container -->
    </div>
    <!-- Javacsript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <!-- /Javacsript -->
</body>

</html>