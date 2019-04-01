( function ( $ ) {
  "use strict";
  //doughut chart
  var distribution = document.getElementById("doughnutChart");
  distribution.height = 150;
  jQuery.ajax({
    method: 'GET',
    url: 'dashboard/get_student_distribution',
    dataType: 'JSON',
    beforeSend:function(){
      jQuery('.spinner1').css('display', 'block');
    },
    success:function(result){
      jQuery('.spinner1').css('display', 'none');
      var distributionChart = new Chart( distribution, {
        type: 'doughnut',
        data: {
          datasets: [{
            data: [ result.Total_kinder, result.Total_elem, result.Total_jhs, result.Total_shs, result.Total_college ],
            backgroundColor: 
            [
              "rgba(75, 199, 234, 0.9)",
              "rgba(254, 215, 102, 0.9)",
              "rgba(43, 198, 126, 0.9)",
              "rgba(248, 51, 60, 0.9)",
              "rgba(3, 63, 99, 0.9)",
            ],
            hoverBackgroundColor: 
            [
              "rgba(75, 199, 234, 0.7)",
              "rgba(254, 215, 102, 0.7)",
              "rgba(43, 198, 126, 0.7)",
              "rgba(248, 51, 60, 0.7)",
              "rgba(3, 63, 99, 0.7)",
            ]
          }],
          labels: 
          [
            "PRE-ELEM",
            "ELEMENTARY",
            "JUNIOR HIGH",
            "SENIOR HIGH",
            "COLLEGE"
          ]
        },
        options: {
          responsive: true
        }
      });
    },
    error:function(){
      //
    }
  });

  //doughut chart
  var yearly = document.getElementById("lineChart");
  yearly.height = 150;
  jQuery.ajax({
    method: 'GET',
    url: 'dashboard/get_yearly_student_total',
    dataType: 'JSON',
    beforeSend:function(){
      jQuery('.spinner2').css('display', 'block');
    },
    success:function(result){
      jQuery('.spinner2').css('display', 'none');
      var yearLabel = [];
      var preElemData = [];
      var elemData = [];
      var jhsData = [];
      var shsData = [];
      var collegeData = [];

      for(let i = 0;i<=result.elem.length-1;i++){
        yearLabel.push(result.elem[i].year);
      }
      for(let i = 0;i<=result.kinder.length-1;i++){
        preElemData.push(result.kinder[i].total);
      }
      for(let i = 0;i<=result.elem.length-1;i++){
        elemData.push(result.elem[i].total);
      }
      for(let i = 0;i<=result.jhs.length-1;i++){
        jhsData.push(result.jhs[i].total);
      }
      for(let i = 0;i<=result.shs.length-1;i++){
        shsData.push(result.shs[i].total);
      }
      for(let i = 0;i<=result.college.length-1;i++){
        collegeData.push(result.college[i].total);
      }
      
      var yearlyChart = new Chart( yearly, {
        type: 'line',
        data: {
          labels: yearLabel,
          type: 'line',
          datasets: 
          [{
            label: "PRE-ELEM",
            data: preElemData,
            backgroundColor: 'transparent',
            borderColor: 'rgba(75, 199, 234, 0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(75, 199, 234, 0.75)',
          },
          {
            label: "ELEMENTARY",
            data: elemData,
            backgroundColor: 'transparent',
            borderColor: 'rgba(254, 215, 102, 0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(254, 215, 102, 0.75)',
          },
          {
            label: "JUNIOR HIGH",
            data: jhsData,
            backgroundColor: 'transparent',
            borderColor: 'rgba(43, 198, 126, 0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(43, 198, 126, 0.75)',
          },
          {
            label: "SENIOR HIGH",
            data: shsData,
            backgroundColor: 'transparent',
            borderColor: 'rgba(248, 51, 60, 0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(248, 51, 60, 0.75)',
          },
          {
            label: "COLLEGE",
            data: collegeData,
            backgroundColor: 'transparent',
            borderColor: 'rgba(3, 63, 99, 0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(3, 63, 99, 0.75)',
          }]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: true
          }
        }
      });
    },
    error:function(){
      //
    }
  });
})( jQuery );