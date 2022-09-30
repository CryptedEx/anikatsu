<?php 
require('./php/info.php');
$parts=parse_url($_SERVER['REQUEST_URI']); 
$page_url=explode('/', $parts['path']);
$url = $page_url[count($page_url)-1];
//$url = "naruto-episode-2";
$getEpisode = file_get_contents("$apiLink/getEpisode/$url");
$getEpisode = json_decode($getEpisode, true);
$anime = $getEpisode['anime_info'];
$download = str_replace("Gogoanime", "AniKatsu", $getEpisode['ep_download']);

$getAnime = file_get_contents("$consumetAPI/anime/gogoanime/info/$anime");
$getAnime = json_decode($getAnime, true);
$episodelist = $getAnime['episodes'];
$epNumber = str_replace($getAnime['id'] . "-episode-", "", $url)



?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Watch <?=$getAnime['title']?> Episode <?=$epNumber?> on AniKatsu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Watch <?=$getAnime['title']?> Episode <?=$epNumber?> on AniKatsu">
    <meta name="description" content="<?=substr($getAnime['description'],0, 150)?> ... at <?=$webUrl?>">
    <meta name="keywords" content="AniKatsu, <?=$getEpisode['animeNameWithEP']?>,<?=$getAnime['title']?>, watch anime online, free anime, anime stream, anime hd, english sub">
    <meta name="charset" content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Language" content="en">
    <meta property="og:title" content="Watch <?=$getAnime['title']?> Episode <?=$epNumber?> on AniKatsu">
    <meta property="og:description" content="<?=substr($getAnime['description'],0, 150)?> ... at <?=$webUrl?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="AniKatsu">
    <meta property="og:url" content="<?=$webUrl?>/watch/<?=$url?>">
    <meta itemprop="image" content="<?=$getAnime['image']?>">
    <meta property="og:image" content="<?=$getAnime['image']?>">
    <meta property="twitter:title" content="Watch <?=$getAnime['title']?> Episode <?=$epNumber?> on AniKatsu">
    <meta property="twitter:description" content="<?=substr($getAnime['description'],0, 150)?> ... at <?=$webUrl?>">
    <meta property="twitter:url" content="<?=$webUrl?>/watch/<?=$url?>">
    <meta property="twitter:card" content="summary">
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" type="text/css">
    <link rel="shortcut icon" href="<?=$webUrl?>/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn-eq4.pages.dev/anikatsu/files/css/style.css">
    <link rel="stylesheet" href="https://cdn-eq4.pages.dev/anikatsu/files/css/min.css">
</head>

<body data-page="movie_watch">
    <div id="sidebar_menu_bg"></div>
    <div id="wrapper" data-page="movie_watch">
        <?php include('./php/include/header.php');?>
        <div class="clearfix"></div>
        <div id="main-wrapper" date-page="movie_watch" data-id="">
            <div id="ani_detail">
                <div class="ani_detail-stage">
                    <div class="container">
                        <div class="anis-cover-wrap">
                            <div class="anis-cover"
                                style="background-image: url('<?=$webUrl?>/files/images/banner.webp')">
                            </div>
                        </div>
                        <div class="anis-watch-wrap">
                            <div class="prebreadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li itemprop="itemListElement" itemscope=""
                                            itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                                            <a itemprop="item" href="/"><span itemprop="name">Home</span></a>
                                            <meta itemprop="position" content="1">
                                        </li>
                                        <li itemprop="itemListElement" itemscope=""
                                            itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                                            <a itemprop="item" href="/anime"><span itemprop="name">Anime</span></a>
                                            <meta itemprop="position" content="2">
                                        </li>
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumb-item" aria-current="page">
                                            <a itemprop="item" href="/anime/<?=$anime?>"><span itemprop="name"><?=$getAnime['title']?></span></a>
                                            <meta itemprop="position" content="3">
                                        </li>
                                        <li itemprop="itemListElement" itemscope=""
                                            itemtype="http://schema.org/ListItem" class="breadcrumb-item"
                                            aria-current="page">
                                            <a itemprop="item" href="<?=$webUrl?>/watch/<?=$url?>"><span
                                                    itemprop="name">Episode <?=$epNumber?></span></a>
                                            <meta itemprop="position" content="4">
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="anis-watch anis-watch-tv">
                                <div class="watch-player">
                                    <div class="player-frame">
                                        <div class="loading-relative loading-box" id="embed-loading">
                                            <div class="loading">
                                                <div class="span1"></div>
                                                <div class="span2"></div>
                                                <div class="span3"></div>
                                            </div>
                                        </div>
                                        <iframe name="iframe-to-load" src="/player/v2.php?id=<?=$url?>&download=<?=$download?>" frameborder="0" scrolling="no" allow="accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                                    </div>
                                    <div class="player-controls">
                                        <div class="pc-item pc-resize">
                                            <a href="javascript:;" id="media-resize" class="btn btn-sm"><i
                                                    class="fas fa-expand mr-1"></i>Expand</a>
                                        </div>
                                        <div class="pc-item pc-toggle pc-light">
                                            <div id="turn-off-light" class="toggle-basic">
                                                <span class="tb-name"><i class="fas fa-lightbulb mr-2"></i>Light</span>
                                                <span class="tb-result"></span>
                                            </div>
                                        </div>
                                        <div class="pc-item pc-download">
                                            <a class="btn btn-sm pc-download"
                                                href="<?=$download?>"
                                                target="_blank"><i class="fas fa-download mr-2"></i>Download</a>
                                        </div>
                                        <div class="pc-right">
                                        <?php if($getEpisode['prevEpText'] == "") {
                                            echo "";
                                        } else { ?>
                                        <a href="/watch<?=$getEpisode['prevEpLink']?>">
                                            <button class="btn btn-secondary" type="button" style="float:left;height: 32px;font-size: 14px;font-weight: normal;display: block;"><i class="fa fa-step-backward"></i> Previous</button>
                                        </a>&nbsp; 
                                        <?php } ?>
                                        <?php if($getEpisode['nextEpText'] == "") {
                                            echo "";
                                        } else { ?>
                                        <a href="/watch<?=$getEpisode['nextEpLink']?>">
                                            <button class="btn btn-secondary" type="button" style="float:right;height: 32px;font-size: 14px;font-weight: normal;display: block;">Next <i class="fa fa-step-forward"></i></button>
                                        </a>
                                        <?php } ?>
                                            <div class="pc-item pc-fav" id="watch-list-content"></div>
                                            <div class="pc-item pc-download" style="display:none;">
                                                <a class="btn btn-sm pc-download"><i class="fas fa-download mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="player-servers">
                                    <div id="servers-content">
                                        <div class="ps_-status">
                                            <div class="content">
                                                <div class="server-notice"><strong>Currently watching <b>Episode <?=$getEpisode['ep_num']?></b></strong> Switch to alternate servers in case of error.</div>
                                            </div>
                                        </div>
                                        <div class="ps_-block ps_-block-sub servers-mixed">
                                            <div class="ps__-title"><i class="fas fa-server mr-2"></i>SERVERS:</div>
                                            <div class="ps__-list">
                                                <div class="item">
                                                    <a id="server1" href="/player/v2.php?id=<?=$url?>" target="iframe-to-load" class="btn btn-server active">AniKatsu</a>
                                                </div>
                                                <div class="item">
                                                    <a id="server2" href="<?=$getEpisode['video']?>" target="iframe-to-load" class="btn btn-server">VidStreaming</a>
                                                </div>
                                                <div class="item">
                                                    <a id="server3" href="<?=$getEpisode['streamsb']?>" target="iframe-to-load" class="btn btn-server">StreamSB</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div id="source-guide"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="episodes-content">
                                    <div class="seasons-block seasons-block-max">
                                        <div id="detail-ss-list" class="detail-seasons">
                                            <div class="detail-infor-content">
                                                <div style="min-height:43px;" class="ss-choice">
                                                    <div class="ssc-list">
                                                        <div id="ssc-list" class="ssc-button">
                                                            <div class="ssc-label">List of episodes:</div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div id="episodes-page-1" class="ss-list ss-list-min" data-page="1"
                                                    style="display:block;">

                                                    <?php 
                                                    foreach ($episodelist as $episodelist) {  ?>
                                                    <a title="Episode <?=$episodelist['number']?>" class="ssl-item ep-item <?php if ($url === $episodelist['id']) {echo 'active';}?>"
                                                        href="/watch/<?=$episodelist['id']?>">
                                                        <div class="ssli-order" title=""><?=$episodelist['number']?></div>
                                                        <div class="ssli-detail">
                                                            <div class="ep-name dynamic-name" data-jname="" title="">
                                                            </div>
                                                        </div>
                                                        <div class="ssli-btn">
                                                            <div class="btn btn-circle"><i class="fas fa-play"></i>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="anis-watch-detail">
                                <div class="anis-content">
                                    <div class="anisc-poster">
                                        <div class="film-poster">
                                            <img src="<?=$getAnime['image']?>"
                                                data-src="<?=$getAnime['image']?>"
                                                class="film-poster-img ls-is-cached lazyloaded"
                                                alt="<?=$getAnime['title']?>">
                                        </div>
                                    </div>
                                    <div class="anisc-detail">
                                        <h2 class="film-name">
                                            <a href="/anime/<?=$anime?>" class="text-white dynamic-name"
                                                title="<?=$getAnime['title']?>" data-jname="<?=$getAnime['title']?>"
                                                style="opacity: 1;"><?=$getAnime['title']?></a>
                                        </h2>
                                        <div class="film-stats">
                                            <div class="tac tick-item tick-quality">HD</div>
                                            <div class="tac tick-item tick-dub">SUB</div>
                                            <span class="dot"></span>
                                            <span class="item"><?=$getAnime['status']?></span>
                                            <span class="dot"></span>
                                            <span class="item"><?=$getAnime['releaseDate']?></span>
                                            <span class="dot"></span>
                                            <span class="item"><?=$getAnime['otherName']?></span>
                                            <span class="dot"></span>
                                            <span class="item"><?=$getAnime['type']?></span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="film-description m-hide">
                                            <div class="text"><?=$getAnime['description']?></div>
                                        </div>
                                        <div class="film-text m-hide mb-3">
                                            AniKatsu is a site to watch online anime like <strong><?=$getAnime['title']?></strong> online, or you can even watch <strong><?=$getAnime['title']?></strong> in HD quality
                                        </div>
                                        <div class="block"><a href="/anime/<?=$anime?>"
                                                class="btn btn-xs btn-light"><i class="fas fa-book-open mr-2"></i> View detail</a></div>
                                        <div class="dt-rate">
                                            <div class="loading-relative" id="vote-loading" style="display: none;">
                                                <div class="loading">
                                                    <div class="span1"></div>
                                                    <div class="span2"></div>
                                                    <div class="span3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="main-content">
                    <section class="block_area block_area-comment">
                        <div class="block_area-header block_area-header-tabs">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Comments</h2>
                            </div>
                            <div class="float-left bah-setting">
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                            <div class="show-comments">
                                <div class="text-center">
                                <div id="disqus_thread"></div>
                                      <script>
                                          (function() { // DON'T EDIT BELOW THIS LINE
                                          var d = document, s = d.createElement('script');
                                          s.src = 'https://anikatsu-1.disqus.com/embed.js';
                                          s.setAttribute('data-timestamp', +new Date());
                                          (d.head || d.body).appendChild(s);
                                          })();
                                      </script>
                                      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                      <script id="dsq-count-scr" src="//anikatsu-1.disqus.com/count.js" async></script>
                                </div>
                            </div>
                        </div>
                    </section>

                    <?php include('./php/include/recentReleases.php'); ?>
                    <div class="clearfix"></div>
                </div>
                <?php include('./php/include/main-sidenav.php'); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php include('./php/include/footer.html'); ?>
        <div id="mask-overlay"></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn-eq4.pages.dev/anikatsu/files/js/video.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script type="text/javascript" src="https://cdn-eq4.pages.dev/anikatsu/files/js/app.js"></script>
        <script type="text/javascript" src="https://cdn-eq4.pages.dev/anikatsu/files/js/comman.js"></script>
        <script type="text/javascript" src="https://cdn-eq4.pages.dev/anikatsu/files/js/movie.js"></script>
        <link rel="stylesheet" href="https://cdn-eq4.pages.dev/anikatsu/files/css/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdn-eq4.pages.dev/anikatsu/files/js/function.js"></script>
        <script type="text/javascript">
            $(".btn-server").click(function () {
                $(".btn-server").removeClass("active");
                $(this).closest(".btn-server").addClass("active");
            });
        </script>
    </div>
</body>

</html>
