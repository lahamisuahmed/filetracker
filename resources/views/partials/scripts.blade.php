<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }} "></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/icheck.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready (function(){
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
       		$("#success-alert").slideUp(500);
        });   

        $("#warning-alert").fadeTo(2000, 500).slideUp(500, function(){
       		$("#warning-alert").slideUp(500);
        });   
 	});
</script>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>


</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.data = [
  {
    day: "Monday",
    numberOfFiles: 89
  },
  {
    day: "tuesday",
    numberOfFiles: 70
  },
  {
    day: "Wednesday",
    numberOfFiles: 40
  },
  {
    day: "Thursday",
    numberOfFiles: 20
  },
  {
    day: "Friday",
    numberOfFiles: 89
  }
];

chart.innerRadius = am4core.percent(40);
chart.depth = 120;

chart.legend = new am4charts.Legend();

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "numberOfFiles";
series.dataFields.depthValue = "numberOfFiles";
series.dataFields.category = "day";
series.slices.template.cornerRadius = 5;
series.colors.step = 4;

}); // end am4core.ready()
</script>

