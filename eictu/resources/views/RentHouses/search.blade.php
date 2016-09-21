<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/09/2016
 * Time: 8:48 SA
 */
 ?>
 <?php
 /**
  * Created by PhpStorm.
  * User: Admin
  * Date: 19/09/2016
  * Time: 11:41 CH
  */

  ?>
  @extends('layouts.app')

  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Tìm kiếm thông tin nhà trọ của sinh viên</div>

                  <div class="panel-body">
                      <form action = "{{url("renthouses_search")}}" method = "post" class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="masv">Mã sinh viên:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="masv" name="masv" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      </form>
                  </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Ngày bắt đầu ở</th>
                      <th>Họ tên chủ trọ</th>
                      <th>Địa chỉ nhà trọ</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $stt=1;
                    foreach($data as $item){
                        $date = new DateTime($item->ngayvaotro);
                        echo "<tr>";
                        echo "<td>".$stt++."</td>";
                        echo "<td>".$date->format('d/m/Y')."</td>";
                        echo "<td>$item->hotenchunha</td>";
                        echo "<td>$item->diachinhatro</td>";
                        echo "<tr>";
                    }
                  ?>
                  </tbody>
                </table>
                </div>

          </div>
      </div>
  </div>
  @endsection