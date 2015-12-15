<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $settings['title'] ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap.min.css' ) ?>" rel="stylesheet">

    <link href="<?php echo wpmmp_css_url( 'public/bootstrap/css/bootstrap-theme.min.css' ) ?>" rel="stylesheet">

    <link href="<?php echo plugins_url( 'assets/css/style.css' , __FILE__ ) ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_print_scripts( array( 'jquery' ) ) ?>

    <script src="<?php echo wpmmp_css_url( 'public/bootstrap/js/bootstrap.min.js' ) ?>"></script>

    <script src="<?php echo plugins_url( 'assets/js/jquery.countdown.min.js' , __FILE__ ) ?>"></script>


    <?php do_action( 'wpmmp_head' ) ?>
  </head>
  <body>
    <div id="wrapper" class="<?php echo $settings['theme'] ?>">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <img width="200" src="<?php echo plugins_url( 'assets/img/logo.png' , __FILE__ ) ?>" alt="STORY" />
          </div>
          <div class="col-sm-12 col-md-12 col-lg-12">
            <h1><?php echo $settings['heading1'] ?></h1>
            <h2 class="subtitle"><?php echo $settings['heading2'] ?></h2>
            <?php if ( $settings['countdown_timer'] ): ?>
            <?php if ( defined( 'WPMMP_PRO_VERSION_ENABLED' ) ): ?>
            <div id="countdown"></div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if ( $settings['progress_bar'] ): ?>
            <div class="progress">
              <div class="bar" data-percentage="<?php echo $settings['progress_bar_range'] ?>">
              </div>
            </div>
            <?php endif; ?>
          </div>
          
        </div>
        <div class="row">
            <div id="content">
              <?php echo wpautop( do_shortcode( $settings['content'] ) ) ?>
            </div>
        </div>    
      </div>
    </div>

    <script>
      jQuery(function ($) {
        $('#countdown').countdown( '<?php echo $cd_date ?>', function(event) {
            var $this = $(this).html(event.strftime(''
               + '<span>%d</span> days '
               + '<span>%H</span> hr '
               + '<span>%M</span> min '
               + '<span>%S</span> sec'));
        });

        setTimeout(function(){

        $('.progress .bar').each(function() {
            var me = $(this);
            var perc = me.attr("data-percentage");

            var current_perc = 0;

            var progress = setInterval(function() {
                if (current_perc>=perc) {
                    clearInterval(progress);
                } else {
                    current_perc +=1;
                    me.css('width', (current_perc)+'%');
                }

                me.text((current_perc)+'%');

            }, 50);

        });

      },300);

      });

      
    </script>

    
    <?php do_action( 'wpmmp_footer' ) ?>
  </body>
</html>