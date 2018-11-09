<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Coalition Code Test</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="col-sm">
          <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                  <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($error); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
              </div>
          <?php endif; ?>
          <form action="<?php echo e(route('postProduct')); ?>" method="post">
            <div class="form-group">
              <label for="inputProductName">Product Name</label>
              <input type="text" class="form-control" name="inputProductName" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label for="inputQuantityStock">Quantity in Stock</label>
              <input type="text" class="form-control" name="inputQuantityStock" placeholder="Quantity in Stock (# only)">
            </div>
            <div class="form-group">
              <label for="inputPricePerUnit">Price Per Unit</label>
              <input type="text" class="form-control" name="inputPricePerUnit" placeholder="Price Per Unit (# only)">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php echo e(csrf_field()); ?>

          </form>
        </div>
        <div class="col-sm">
          <!-- One of three columns -->
        </div>
      </div>
      <div class="row">
        <div class="col">

        </div>
        <div class="col-8">
          <table class="table">
            <tr>
              <td>Product Name</td>
              <td>Quanity</td>
              <td>Price</td>
              <td>Date Time</td>
              <td>Total Value</td>
            </tr>
            <?php
            foreach ($products as $product) {
              $product = get_object_vars($product);
              echo '<tr><td>'.$product['product'].'</td><td>'.
              $product['quanity'].'</td><td>'.$product['price'].
              '</td><td>'.$product['created_at'].'</td><td>'.
              $product['quanity']*$product['price'].'</td></tr>';
            }
            ?>
          </table>
        </div>
        <div class="col">

        </div>
      </div>
    </div>
  </body>
</html>
