<!-- amCharts javascript code -->
    <script type="text/javascript">
      AmCharts.makeChart("chart1",
        {
          "type": "serial",
          "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
          "categoryField": "category",
          "startDuration": 1,
          "backgroundColor": "#2f3139",
          "theme": "dark",
          "categoryAxis": {
            "gridPosition": "start"
          },
          "trendLines": [],
          "graphs": [
            {
              "balloonText": "[[title]] of [[category]]:[[value]]",
              "fillAlphas": 0.7,
              "id": "AmGraph-1",
              "lineAlpha": 0,
              "title": "graph 1",
              "valueField": "column-1"
            },
            {
              "balloonText": "[[title]] of [[category]]:[[value]]",
              "fillAlphas": 0.7,
              "id": "AmGraph-2",
              "lineAlpha": 0,
              "title": "graph 2",
              "valueField": "column-2"
            }
          ],
          "guides": [],
          "valueAxes": [],
          "allLabels": [],
          "balloon": {},
          "legend": {},
          "titles": [],
          "dataProvider": [
                  {
                    "category": "category 1",
                    "column-1": "0",
                    "column-2": "0"
                  },
                  {
                    "category": "category 2",
                    "column-1": "12",
                    "column-2": "6"
                  },
                  {
                    "category": "category 3",
                    "column-1": 2,
                    "column-2": 3
                  },
                  {
                    "category": "category 4",
                    "column-1": "10",
                    "column-2": "5"
                  },
                  {
                    "category": "category 5",
                    "column-1": 2,
                    "column-2": 1
                  },
                  {
                    "category": "category 6",
                    "column-1": 3,
                    "column-2": 2
                  },
                  {
                    "category": "",
                    "column-1": "",
                    "column-2": ""
                  }
          ]
        }
      );
    </script>

    <script type="text/javascript">
      AmCharts.makeChart("chart2",
        {
          "type": "pie",
          "pathToImages": "http://cdn.amcharts.com/lib/3/images/",
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "innerRadius": "40%",
          "labelText": "",
          "alphaField": "Not set",
          "colors": [
            "#9f86ff",
            "#007ae1",
            "#1ca8dd",
            "#c9f0e1",
            "#d48652",
            "#629b6d",
            "#719dc3",
            "#719dc3"
          ],
          "outlineThickness": 0,
          "titleField": "category",
          "urlField": "Not set",
          "valueField": "column-1",
          "visibleInLegendField": "category",
          "backgroundColor": "#2F323A",
          "theme": "dark",
          "allLabels": [],
          "balloon": {},
          "legend": {
            "align": "center",
            "markerType": "circle"
          },
          "titles": [],
          "dataProvider": [
            {
              "category": "New Costumers",
              "column-1": "8"
            },
            {
              "category": "Sales",
              "column-1": "6"
            },
            {
              "category": "Refund",
              "column-1": "2"
            }
          ]
        }
      );
    </script>
    
  <script type="text/javascript">
   $(document).ready(
      function()
      {
         $('#date, #datemasuk, #datekeluar').datepicker({ format: 'yyyy-mm-dd' });

         $("[rel=tooltip]").tooltip();

         jQuery('ul.nav li.dropdown').hover(function() {
           jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
         }, function() {
           jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
         });
      }
   );
   </script>

   <script type="text/javascript">
       var nowTemp = new Date();
      var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

      var checkin = $('#dpd1').datepicker({
         format: 'yyyy-mm-dd',
          onRender: function (date) {
              return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
      }).on('changeDate', function (ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
              var newDate = new Date(ev.date)
              newDate.setDate(newDate.getDate() + 1);
              checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
      }).data('datepicker');
      var checkout = $('#dpd2').datepicker({
         format: 'yyyy-mm-dd',
          onRender: function (date) {
              return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
      }).on('changeDate', function (ev) {
          checkout.hide();
      }).data('datepicker');
   </script