<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="title" content="Gigil Berlin">
    <link href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="lib/owl.carousel.2.0.0-beta.2.4/assets/owl.theme.min.css" />
    <link rel="stylesheet" type="text/css" href="lib/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="lib/d3.min.js"></script>
    <script src="lib/jquery-1.11.3.min.js"></script>
    <script src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="lib/packery/packery.pkgd.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/isotope/layout-modes/packery-mode.pkgd.min.js"></script>
    <script src="lib/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <script src="js/logoanim.js"></script>
    <script src="js/domready.js"></script>
  </head>
  <body>
    <div class="container-fluid header" name="top">
      <header class="row">
        <nav class="filters col-xs-4 col-sm-5">
          <ul class="button-group hidden-xs">
            <li><a data-filter="websites" href="#websites" class="is-checked">websites</a></li>
            <li><a data-filter="interfaces" href="#interfaces">interfaces</a></li>
            <li><a data-filter="print" href="#print">print</a></li>
            <li><a data-filter="electronics" href="#electronics">electronics</a></li>
            <li><a data-filter="games" href="#games">games</a></li>
          </ul>
        </nav>
        <div class="col-xs-4 col-sm-2 noPadding">
          <div class="col-xs-2 noPadding"></div>
          <div class="col-xs-8 noPadding" id="logo">
            <a href="#" title="Portfolio of Hallvard Kristiansen" rel="home" class="text-center"><img src="grfx/gigil_logo.svg" alt="I gigil U" /></a>
          </div>
          <div class="col-xs-2 noPadding"></a></div>
        </div>
        <nav class="col-xs-4 col-sm-5">
          <ul class="text-right">
            <li><a href="#email">email</a></li>
            <li><a href="#linkedin">linkedin</a></li>
          </ul>
        </nav>
      </header>
    </div>
    <div class="container-fluid content">
      <div class="row">
        <div class="grid col-xs-12">
          <div class="stamp" id="displaypane"></div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/quads/sample_quads_small.png" alt="sample_quads_small" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel">
                <div class="imagewrapper"><img src="samples/quads/sample_quads.jpg" alt="sample_quads" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/quads/sample_quads2.jpg" alt="sample_quads" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/quads/hexa1_large.jpg" alt="hexa1_large" width="1600" height="900"></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Various multipcopters</h1>
                  <p>Some of the multicopters I've designed and built over the years.</p>
                  <p>The first one I designed, built and programmed in 2010 entirely from scratch using an Arduino Pro and Sparkfun's 9dof IMU.<br/>
                    The benefit of that setup was that the IMU has it's own ATMEGA chip, so it can fully preprocess the sensor data before passing to the Arduino which runs the PID loop.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>I achieved an update frequency of approximately 250hz using this setup, which was enough for stable flight, however well below the recommended 500hz minimum.</p>
                  <p>Later models are hybrids of open source controllers, kits and shelf components.</p>
                </div>
              </div>
            </div>
            <div class="websites hidden">a</div>
            <div class="interfaces hidden">b</div>
            <div class="print hidden">c</div>
            <div class="electronics hidden">z</div>
            <div class="games hidden">z</div>
          </div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2 initial">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/edgefolio/sample.png" alt="sample" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel owl-theme">
                <div class="imagewrapper"><img src="samples/edgefolio/sample_large.jpg" alt="sample_large" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/edgefolio/sample_large_close_4.png" alt="sample_large_close_4" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/edgefolio/sample_large_close_3.png" alt="sample_large_close_3" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/edgefolio/sample_large_close_1.png" alt="sample_large_close_1" width="1600" height="900"></div>
                <div class="imagewrapper"><img src="samples/edgefolio/sample_large_close_2.png" alt="sample_large_close_2" width="1600" height="900"></div>
                <div class="videowrapper"><a class="owl-video" href="https://vimeo.com/97531368"></a></div>
                <div class="videowrapper"><a class="owl-video" href="https://vimeo.com/115868816"></a></div>
                <div class="videowrapper"><a class="owl-video" href="https://vimeo.com/115876508"></a></div>
                <div class="videowrapper"><a class="owl-video" href="https://vimeo.com/142147126"></a></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Edgefolio</h1>
                  <p>Web application for navigating Hedge Fund performance data from Morningstar.</p>
                  <p>My roles in this project included all brand design and art direction, user experience planning, user interface design and scripting of all widgets and graphs from 2013 until 2015.</p>
                  <p>Built with Angular.js and D3.js using Elasticsearch and a Django based Rest API.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>The application was designed and built to work with both desktop and tablets.</p>
                  <p>Angular.js framework and HTML/CSS templates by Ahmet Atasoy.
Django Rest API and data importer by Harish Narayanan and Bastien Bourdon.</p>
                  <p>The design has now changed, but most of my graphs remain:<br/>
                    <a href="http://www.edgefolio.com" target="_blank">www.edgefolio.com</a></p>
                </div>
              </div>
            </div>
            <div class="websites hidden">b</div>
            <div class="interfaces hidden">a</div>
            <div class="print hidden">z</div>
            <div class="electronics hidden">z</div>
            <div class="games hidden">z</div>
          </div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/desktop_hydroponics/sample.jpg" alt="sample" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel">
                <div class="imagewrapper"><img src="samples/desktop_hydroponics/sample_large.jpg" alt="sample_large" width="1600" height="900"></div>
                <div class="imagewrapper"></div>
                <div class="videowrapper"></div>
                <div class="imagewrapper"></div>
                <div class="imagewrapper"></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Tabletop hydroponics</h1>
                  <p>I built this small hydroponic/deep water culture setup to grow herbs on top of my refrigerator. So far I've successfully grown basil, thyme, tarragon, spearmint, oregano and strawberries.</p>
                  <p>The growth pictured above took about two months from seed.</p>
                  <p>The bulbs are custom made, full-spectrum, air-cooled LEDs rated for 54W but pulling approximately 27W each.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>Water circulation is driven by a small brushless water pump immersed in the tub, sometimes supplemented with a standard aquarium air pump with air stones.</p>
                  <p>Lighting is controlled using digital socket timers bought in an electronics store.</p>
                  <p>I use coconut husk and hydroton for growth medium and standard, hydroponic nutrients from the gardening shop.</p>
                </div>
              </div>
            </div>
            <div class="websites hidden">z</div>
            <div class="interfaces hidden">z</div>
            <div class="print hidden">c</div>
            <div class="electronics hidden">b</div>
            <div class="games hidden">a</div>
          </div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/koffaein/fb_1667x1667_alt.jpg" alt="fb_1667x1667_alt" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel">
                <div class="imagewrapper"><img src="samples/koffaein/sample_large.jpg" alt="sample_large" width="1600" height="900"></div>
                <div class="imagewrapper"></div>
                <div class="videowrapper"></div>
                <div class="imagewrapper"></div>
                <div class="imagewrapper"></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Promotional material for Koffäin</h1>
                  <p>Various flyers, posters and facebook banners designed for events organised by Koffäin.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>Dunno what to say about this really</p>
                  <p><a href="http://www.koffaein.de" target="_blank">www.koffaein.de</a></p>
                </div>
              </div>
            </div>
            <div class="websites hidden">g</div>
            <div class="interfaces hidden">c</div>
            <div class="print hidden">z</div>
            <div class="electronics hidden">z</div>
            <div class="games hidden">z</div>
          </div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/xjazz/sample.jpg" alt="sample" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel">
                <div class="imagewrapper"><img src="samples/xjazz/sample_large.jpg" alt="sample_large" width="1600" height="900"></div>
                <div class="imagewrapper"></div>
                <div class="videowrapper"></div>
                <div class="imagewrapper"></div>
                <div class="imagewrapper"></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Promotional material for Koffäin</h1>
                  <p>Various flyers, posters and facebook banners designed for events organised by Koffäin.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>Dunno what to say about this really</p>
                  <p><a href="http://www.koffaein.de" target="_blank">www.koffaein.de</a></p>
                </div>
              </div>
            </div>
            <div class="websites hidden">g</div>
            <div class="interfaces hidden">c</div>
            <div class="print hidden">z</div>
            <div class="electronics hidden">z</div>
            <div class="games hidden">z</div>
          </div>
          <div class="grid-item col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <a href="#sample" class="trigger hidden-xs"><img src="samples/earthtime/sample.jpg" alt="sample" width="500" height="500"></a>
            <div class="infopane visible-xs">
              <div class="owl-carousel">
                <div class="imagewrapper"><img src="samples/earthtime/sample_large.jpg" alt="sample_large" width="1600" height="900"></div>
                <div class="imagewrapper"></div>
                <div class="videowrapper"></div>
                <div class="imagewrapper"></div>
                <div class="imagewrapper"></div>
              </div>
              <div class="textbox">
                <div class="column_1 col-xs-12 col-sm-6">
                  <h1>Promotional material for Koffäin</h1>
                  <p>Various flyers, posters and facebook banners designed for events organised by Koffäin.</p>
                </div>
                <div class="column_2 col-xs-12 col-sm-6">
                  <p>Dunno what to say about this really</p>
                  <p><a href="http://www.koffaein.de" target="_blank">www.koffaein.de</a></p>
                </div>
              </div>
            </div>
            <div class="websites hidden">g</div>
            <div class="interfaces hidden">c</div>
            <div class="print hidden">z</div>
            <div class="electronics hidden">z</div>
            <div class="games hidden">z</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>