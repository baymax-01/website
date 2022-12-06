<?php
$data_tickets_log = $data_log->data_tickets;
$data_orders_log  = $data_log->data_orders;

$comparission = ($data_orders_log->completed / $data_orders_log->total) * 100;
$comparission = round($comparission);

if($data_orders_log->completed == 0){
  $comparission = 0;
}

switch (get_option('currency_decimal_separator', 'dot')) {
  case 'dot':
    $decimalpoint = '.';
    break;
  case 'comma':
    $decimalpoint = ',';
    break;
  default:
    $decimalpoint = '';
    break;
}

switch (get_option('currency_thousand_separator', 'comma')) {
  case 'dot':
    $separator = '.';
    break;
  case 'comma':
    $separator = ',';
    break;
  case 'space':
    $separator = ' ';
    break;
  default:
    $separator = '';
    break;
}
$currency_symbol = get_option('currency_symbol', "$");
?>
<div class="row justify-content-center row-card statistics">
  <div class="col-sm-12">
          <?php if($data_log->user_balance < 10) {?>
    <div id="balance_warning" class="alert alert-warning">
      <span class="inline-block align-middle mr-8">
    <i class="fa fa-bell"></i>   Dear<b class="capitalize"> <?=get_field(USERS, ["id" => session('uid')], 'first_name')?></b> Your balance seems to be running low, don't forget to top up for trouble-free service.
      </span>
    </div>
    <?php } ?>
    <div class="row">
      <?php
      if (get_role("admin")) {
      ?>
        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success-gradient text-red mr-3">
                <i data-feather="users"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?= $data_log->total_users ?></h4>
                  <small class="text-muted "><?= lang("total_users") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success-gradient text-red mr-3">
                <i data-feather="dollar-sign"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?= get_option('currency_symbol', "$") ?><?= (!empty($data_log->user_balance)) ? currency_format($data_log->user_balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0 ?></h4>
                  <small class="text-muted "><?= lang("your_balance") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-info-gradient text-red mr-3">
              <i data-feather="dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= get_option('currency_symbol', "$") ?><?= (!empty($data_log->total_spent_receive)) ? currency_format($data_log->total_spent_receive, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0 ?></h4>
                <small class="text-muted ">
                  <?= (get_role("admin") ? lang("total_amount_recieved") : lang("total_amount_spent")) ?>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-warning-gradient text-red mr-3">
              <i data-feather="shopping-cart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->total ?></h4>
                <small class="text-muted "><?= lang("total_orders") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-danger-gradient text-red mr-3">
              <i data-feather="paperclip"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_tickets_log->total ?></h4>
                <small class="text-muted "><?= lang("total_tickets") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    if (get_role("admin")) {
    ?>
      <div class="row">
        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-success-gradient text-red mr-3">
              <i data-feather="dollar-sign"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?php echo $currency_symbol . number_format($data_log->users_balance, 2, '.', ','); ?></h4>
                  <small class="text-muted "><?php echo lang("total_users_balance"); ?> </small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-info-gradient text-red mr-3">
              <i data-feather="credit-card"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?php echo $currency_symbol . number_format($data_log->providers_balance, 2, '.', ','); ?></h4>
                  <small class="text-muted "><?php echo lang("total_providers_balance"); ?> </small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-warning-gradient text-red mr-3">
              <i data-feather="dollar-sign"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?php echo $currency_symbol . number_format($data_log->last_profit_30_days, 2, '.', ','); ?></h4>
                  <small class="text-muted "><?php echo lang("total_profit_30_days"); ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-danger-gradient text-red mr-3">
              <i data-feather="dollar-sign"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?php echo $currency_symbol . number_format($data_log->profit_today, 2, '.', ','); ?></h4>
                  <small class="text-muted "><?php echo lang("total_profit_today"); ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row">

      <div class="col-md-12 col-lg-12 col-xl-8 mb-3">
        <div class="white_card" style="height: 100%;">
          <div class="white_card_header bg-transparent pd-b-0 pd-t-20 bd-b-0">
            <div class="d-flex justify-content-between">
              <h4 class="card-title mb-0">Order status</h4> <i style="width: 20px; height: 20px;" data-feather="bar-chart-2" class="text-gray"></i>
            </div>
          </div>
          <div class="white_card_body">

            <div id="bar" class="sales-bar" style="min-height: 263px;">

            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-12 col-lg-6 mb-3">
        <div class="white_card" style="height: 100%;">
          <div class="white_card_header pb-0">
            <h3 class="card-title mb-2">Recent Orders</h3>
          </div>
          <div class="white_card_body sales-info ot-0 pt-0 pb-0">
            <div id="chart" class="ht-250 mt-2" style="min-height: 250px;">

            </div>
            <div class="row sales-infomation pb-0 mb-0 mx-auto wd-100p">
              <div class="col-md-6 col">
                <p class="mb-0 d-flex"><span class="legend bg-primary brround"></span>Total</p>
                <h3 class="mb-1"><?php echo $data_orders_log->total; ?></h3>
                <div class="d-flex">
                  <p class="text-muted ">All Time</p>
                </div>
              </div>
              <div class="col-md-6 col">
                <p class="mb-0 d-flex"><span class="legend bg-info brround"></span>Completed</p>
                <h3 class="mb-1"><?php echo $data_orders_log->completed; ?></h3>
                <div class="d-flex">
                  <p class="text-muted">All Time</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="list"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->total ?></h4>
                <small class="text-muted "><?= lang("total_orders") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?= $data_orders_log->completed ?></h4>
                <small class="text-muted"><?= lang("Completed") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="trending-up"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->processing ?></h4>
                <small class="text-muted "><?= lang("Processing") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="loader"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->inprogress ?></h4>
                <small class="text-muted "><?= lang("In_progress") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->pending ?></h4>
                <small class="text-muted "><?= lang("Pending") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i class="fa fa-hourglass-half"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->partial ?></h4>
                <small class="text-muted "><?= lang("Partial") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="x-square"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->canceled ?></h4>
                <small class="text-muted "><?= lang("Canceled") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-lg-3 item mb-3">
        <div class="white_card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-red">
              <i data-feather="rotate-ccw"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?= $data_orders_log->refunded ?></h4>
                <small class="text-muted "><?= lang("Refunded") ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if (get_role('admin')) {
      ?>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-4">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md mr-3 text-red">
                <i data-feather="paperclip"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?= $data_tickets_log->total ?></h4>
                  <small class="text-muted "><?= lang("total_tickets") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-4">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md mr-3 text-red">
                <i data-feather="mail"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 number"><?= $data_tickets_log->new ?></h4>
                  <small class="text-muted"><?= lang("New") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-4">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md mr-3 text-red">
                <i data-feather="pie-chart"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?= $data_tickets_log->pending ?></h4>
                  <small class="text-muted "><?= lang("Pending") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3 item mb-3">
          <div class="white_card p-4">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md mr-3 text-red">
                <i data-feather="check"></i>
              </span>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="ml-2 d-lg-block text-right">
                  <h4 class="m-0 text-right number"><?= $data_tickets_log->closed ?></h4>
                  <small class="text-muted "><?= lang("Closed") ?></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>


<div class="row justify-content-center">

  <!-- Top Best Sellers -->
  <div class="col-md-12">
    <?php

    if (get_role('admin')) {
      $columns_best_seller = array(
        "name"             => lang("Name"),
        "total_orders"     => lang("total_orders"),
        "add_type"         => lang("Type"),
        "provider"         => lang("api_provider"),
        "api_service_id"   => lang("api_service_id"),
        "price"            => lang("rate_per_1000") . "(" . get_option("currency_symbol", "") . ")",
        "min_max"          => lang("min__max_order"),
        "desc"             => lang("Description"),
        "status"           => lang("Status"),
      );
    } else {
      $columns_best_seller = array(
        "name"             => lang("Name"),
        "price"            => lang("rate_per_1000") . "(" . get_option("currency_symbol", "") . ")",
        "min_max"          => lang("min__max_order"),
        "desc"             => lang("Description"),
      );
    }
    $data = array(
      'services' => $top_bestsellers,
      'columns'  => $columns_best_seller
    );
    $this->load->view('top_bestsellers', $data);
    ?>
  </div>

  <?php
  if (get_role('admin')) {
  ?>
    <!-- Last 5 Newest Users -->
    <div class="col-md-12">
      <?php
      $data = array(
        'users' => $last_5_users,
        'columns'  => array(
          "name"                   => lang("name"),
          "Email"                  => lang("Email"),
          "type"                   => lang("Type"),
          "balance"                => lang('Funds'),
          "last_ip_address"        => 'Last IP Address',
          "created"                => lang("Created"),
          "status"                 => lang('Status'),
        )
      );
      $this->load->view('last_5_users', $data);
      ?>
    </div>

    <!-- Last 5 order -->
    <div class="col-md-12">
      <?php
      $data = array(
        'order_logs' => $last_5_orders,
        'columns'  => array(
          "order_id"            => lang("order_id"),
          "uid"                 => lang("User"),
          "name"                => lang("name"),
          "type"                => lang("Type"),
          "link"                => lang("Link"),
          "quantity"            => lang("Quantity"),
          "amount"              => lang("Amount"),
          "created"             => lang("Created"),
          "status"              => lang("Status"),
        )
      );
      $this->load->view('last_5_orders', $data);
      ?>
    </div>
  <?php } ?>

</div>



<script>
  $(function() {
    var optionsBar = {
      chart: {
        height: 249,
        type: 'area',
        toolbar: {
          show: false,
        },
        fontFamily: 'Nunito, sans-serif',
        // dropShadow: {
        //   enabled: true,
        //   top: 1,
        //   left: 1,
        //   blur: 2,
        //   opacity: 0.2,
        // }
      },
      colors: ["#03ff3d", "#036fe7", '#f93a5a'],
      plotOptions: {
        bar: {
          dataLabels: {
            enabled: false
          },
          columnWidth: '42%',
          endingShape: 'rounded',
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 2,
      },

      responsive: [{
        breakpoint: 576,
        options: {
          stroke: {
            show: true,
            width: 1,
            endingShape: 'rounded',
            colors: ['transparent'],
          },
        },


      }],
      series: [{
        name: 'Completed',
        data: <?php echo $data_orders_log->data_orders_chart_spline['completed']; ?>
      }, {
        name: 'Pending',
        data: <?php echo $data_orders_log->data_orders_chart_spline['pending']; ?>
      }, {
        name: 'Refunded',
        data: <?php echo $data_orders_log->data_orders_chart_spline['refunded']; ?>
      }],
      xaxis: {
        categories: <?php echo $data_orders_log->data_orders_chart_spline['time']; ?>,
      },
      fill: {
        opacity: 1
      },
      legend: {
        show: false,
        floating: true,
        position: 'top',
        horizontalAlign: 'left',


      },

      tooltip: {
        y: {
          formatter: function(val) {
            return val
          }
        }
      }
    }
    new ApexCharts(document.querySelector('#bar'), optionsBar).render();

    var options = {
      chart: {
        height: 215,
        type: 'radialBar',
        offsetX: 0,
        offsetY: 0,
      },
      plotOptions: {
        radialBar: {
          startAngle: -135,
          endAngle: 135,
          size: 120,
          imageWidth: 50,
          imageHeight: 50,

          track: {
            strokeWidth: "80%",
            background: '#ecf0fa',
          },
          dropShadow: {
            enabled: false,
            top: 0,
            left: 0,
            bottom: 0,
            blur: 3,
            opacity: 0.5
          },
          dataLabels: {
            name: {
              fontSize: '16px',
              color: undefined,
              offsetY: 30,
            },
            hollow: {
              size: "60%"
            },
            value: {
              offsetY: -10,
              fontSize: '22px',
              color: undefined,
              formatter: function(val) {
                return val + "%";
              }
            }
          }
        }
      },
      colors: ['#0db2de'],
      fill: {
        type: "gradient",
        gradient: {
          shade: "dark",
          type: "horizontal",
          shadeIntensity: .5,
          gradientToColors: ['#005bea'],
          inverseColors: !0,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      stroke: {
        dashArray: 4
      },
      series: [<?php echo $comparission; ?>],
      labels: [""]
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

  });


  $(document).ready(function() {

    /* Apexcharts (#bar) */





    // Chart_template.chart_spline('#orders_chart_spline', <?= $data_orders_log->data_orders_chart_spline ?>);
    // Chart_template.chart_pie('#orders_chart_pie', <?= $data_orders_log->data_orders_chart_pie ?>);

    // Chart_template.chart_spline('#tickets_chart_spline', <?= $data_tickets_log->data_tickets_chart_spline ?>);
    // Chart_template.chart_pie('#tickets_chart_pie', <?= $data_tickets_log->data_tickets_chart_pie ?>);
  });
</script>