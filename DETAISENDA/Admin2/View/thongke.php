    <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
             var rows=new Array();
             var data=new google.visualization.DataTable();
             var tensp=new Array();
             var soluongban=new Array();
             var datenhh=0;
             var soluong=0;
             <?php
              $hh=new sanpham();
              $results=$hh->getListHangHoa_thongke();
              while($set=$results->fetch())
              {
                $tensp=$set['tensp'];
                $slb=$set['soluongban'];
                echo "tensp.push('".$tensp."');";
                echo "soluongban.push('".$slb."');";
              }
            ?>
            //  dùng vòng lặp loop qua mảng 
            for(var i=0;i<tensp.length;i++)
            {
              datenhh=tensp[i];
              soluong=parseInt(soluongban[i]);
              rows.push([datenhh,soluong]);
            }
            //  tenhh[giày cao got,giày cao got 1]
            // soluong[45,55]
            //  tạo cột
            data.addColumn('string','Hàng Hóa');
            data.addColumn('number','Số lượng bán');
          
            // tạo dòng
            data.addRows(rows);
            // option
            var option={
              title:'Thống kê số lượng các mặt hàng được bán',
              'width':600,
              'height':400,
              'backgroundColor':'#ffffff',
              is3D:true
            };
            // bước cuối là vẽ
            var chart=new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data,option);

                   
	 }
                   
    </script>
        <div class="thongke">
        <div style=" width:100%;  float: left;"   id="chart_div">Vẽ ở đây</div>
        <!-- <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>     -->
      </div>
 
 