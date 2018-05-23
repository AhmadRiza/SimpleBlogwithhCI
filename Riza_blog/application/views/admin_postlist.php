<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/admin.css">
    <title>Dashboard</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-2 side">
                
                <nav>
                    <div class="avt-box">
                        <img src="<?php echo base_url().'resources/img/'.$this->session->userdata('pict')?>" alt="Avatar" class="avt">
                        <p><?php echo $this->session->userdata('name') ?></p>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="<?php echo base_url();?>admin" class="active">Article Manager</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/new-post" >New Article</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>admin/logout">Log Out</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="col-md-10 main">
                <section>
                    <h1>Posted Article</h1>

                    <div class="sort">
                        <form action="" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                            </div>
                            <div class="form-group">
                                <select name="order" id="" class="form-control">
                                    <option value="latest">Latest</option>
                                    <option value="oldest">Oldest</option>
                                    <option value="mostviews">Most Views</option>
                                    <option value="leastviews">Least Views</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-normal">Sort</button>
                        </form>
                    </div>

                    <div class="content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Views</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                foreach($posts as $i){
                                    ?>
                                    <tr>
                                    <th scope="row"><?php echo $n++;?></th>
                                    <td><?php echo $i['title'];?></td>
                                    <td><?php echo $i['name'];?></td>
                                    <td><?php echo $i['category'];?></td>
                                    <td><?php echo $i['views'];?></td>
                                    <td>
                                        <a href="<?php echo base_url() . $i['category_slug']. $i['slug'];?>" class="btn btn-success" target="_blank">View</a>
                                        <a href="<?php echo base_url() . 'admin/edit-post/'. $i['slug'];?>" class="btn btn-warning">Edit</a>
                                        <a href="javascript:void(0);" onclick="del('<?php echo $i['slug'];?>');" class="btn btn-danger">Delete</a>
                                    </td>
                                    </tr>
                                <?php
                                }
                                ?>

                               
                            </tbody>
                        </table>
                    </div>
                </section>
                
            </div>
        </div>
    </div>

    <script type="text/javascript">
    var url="<?php echo base_url();?>";
    function del(slug){
       var r=confirm("delete "+slug+" ?");
        if (r==true)
          window.location = url+"admin/del-post/"+slug;
        else
          return false;
        } 
</script>
    
</body>
</html>