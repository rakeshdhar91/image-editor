<?php session_start(); 
    include($_SERVER['DOCUMENT_ROOT'].'/DataBase/config.php'); 
    $site_url="https://app.viraldashboard.io/";
    $user_id = $_SESSION['user_id'];
    $token = $_GET['token'];
    $sql = "SELECT json_path,template_name FROM `vd_deziner_image_uploads` WHERE token='$token'";
    $qry = mysqli_query($con,$sql); 
    $rew = mysqli_fetch_array($qry);
    $file_url = $rew['json_path'];
    $template_name = $rew['template_name'];
     
?>
<html> 
 
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
     
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/select2.css" rel="stylesheet" type="text/css">
    <link href="css/spectrum.css" rel="stylesheet" type="text/css">
    <link href="css/ruler.css" rel="stylesheet" type="text/css">
    <link href="css/toastr.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link id="palleon-theme-link" href="css/dark.css" rel="stylesheet" type="text/css">
    <!-- <link id="palleon-theme-link" href="css/light.css" rel="stylesheet" type="text/css"> -->
</head>

<body id="palleon" class="backend">
    <!-- Page Loader START -->
    <div id="palleon-main-loader" class="palleon-loader-wrap">
        <div class="palleon-loader-inner">
            <div class="palleon-loader"></div>
        </div>
    </div>
    <!-- Page Loader END -->
    <!-- Top Bar START -->
    <div id="palleon-top-bar">
        <!-- Logo -->
        <div class="palleon-logo">
            <img class="logo-desktop" src="assets/logo.png" />
            <img class="logo-mobile" src="assets/logo-small.png" />
        </div>
        <!-- Menu -->
        <div class="palleon-top-bar-menu">
            <!-- History -->
            <div class="palleon-undo">
                <button id="palleon-undo" type="button" class="palleon-btn-simple tooltip" data-title="Undo" autocomplete="off" disabled><span class="material-icons">undo</span></button>
            </div>
            <div class="palleon-redo">
                <button id="palleon-redo" type="button" class="palleon-btn-simple tooltip" data-title="Redo" autocomplete="off" disabled><span class="material-icons">redo</span></button>
            </div>
            <div class="palleon-history">
                <button id="palleon-history" type="button" class="palleon-btn-simple palleon-modal-open tooltip" data-title="History" autocomplete="off" data-target="#modal-history" disabled><span class="material-icons">history</span></button>
            </div>
            <!-- New -->
            <div class="palleon-new">
                <button id="palleon-new" type="button" class="palleon-btn primary palleon-modal-open" autocomplete="off" data-target="#modal-add-new"><span class="material-icons">add_circle</span><span class="palleon-btn-text">New</span></button>
            </div>
            <!-- Save -->
            <div class="palleon-save">
                <button id="palleon-save" type="button" class="palleon-btn primary palleon-modal-open" autocomplete="off" data-target="#modal-save" disabled><span class="material-icons">save</span><span class="palleon-btn-text">Save or Download</span></button>
            </div>
            <!-- User Menu -->
            <div class="palleon-user-menu">
                <div id="palleon-user-menu" class="palleon-dropdown-wrap">
                    <img alt="avatar" src='assets/avatar.png' /><span class="material-icons">arrow_drop_down</span>
                    <div class="menu-menu-container">
                        <ul id="palleon-be-menu" class="palleon-dropdown">
                            <li><a href="https://palleon.website/js-version/">Home</a></li>
                            <li><a href="https://palleon.website/js-version/documentation/index.html">Documentation</a></li>
                            <li><a href="https://codecanyon.net/item/palleon-javascript-image-editor/43256130">Buy Now!</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar END -->
    <!-- Icon Menu START -->
    <div id="palleon-icon-menu">
        <button id="palleon-btn-Similar" type="button" class="palleon-icon-menu-btn active" data-target="#palleon-Similar">
            <span class="material-icons">tune</span><span class="palleon-icon-menu-title">Similar</span>
        </button> 
        <button id="palleon-btn-adjust" type="button" class="palleon-icon-menu-btn  " data-target="#palleon-adjust">
            <span class="material-icons">tune</span><span class="palleon-icon-menu-title">Adjust</span>
        </button>
        <button id="palleon-btn-frames" type="button" class="palleon-icon-menu-btn" data-target="#palleon-frames">
            <span class="material-icons">wallpaper</span><span class="palleon-icon-menu-title">Frames</span>
        </button>
        <button id="palleon-btn-text" type="button" class="palleon-icon-menu-btn" data-target="#palleon-text">
            <span class="material-icons">title</span><span class="palleon-icon-menu-title">Text</span>
        </button>
        <button id="palleon-btn-image" type="button" class="palleon-icon-menu-btn" data-target="#palleon-image">
            <span class="material-icons">add_photo_alternate</span><span class="palleon-icon-menu-title">Image</span>
        </button>
        <button id="palleon-btn-shapes" type="button" class="palleon-icon-menu-btn" data-target="#palleon-shapes">
            <span class="material-icons">category</span><span class="palleon-icon-menu-title">Shapes</span>
        </button>
        <button id="palleon-btn-elements" type="button" class="palleon-icon-menu-btn" data-target="#palleon-elements">
            <span class="material-icons">star</span><span class="palleon-icon-menu-title">Elements</span>
        </button>
        <button id="palleon-btn-icons" type="button" class="palleon-icon-menu-btn" data-target="#palleon-icons">
            <span class="material-icons">emoji_emotions</span><span class="palleon-icon-menu-title">Icons</span>
        </button>
        <button id="palleon-btn-qrcode" type="button" class="palleon-icon-menu-btn" data-target="#palleon-qrcode">
            <span class="material-icons">qr_code</span><span class="palleon-icon-menu-title">QR Code</span>
        </button>
        <button id="palleon-btn-draw" type="button" class="palleon-icon-menu-btn" data-target="#palleon-draw">
            <span class="material-icons">brush</span><span class="palleon-icon-menu-title">Brushes</span>
        </button>
        <button id="palleon-btn-settings" type="button" class="palleon-icon-menu-btn stick-to-bottom" data-target="#palleon-settings">
            <span class="material-icons">settings</span><span class="palleon-icon-menu-title">Settings</span>
        </button>
    </div>
    <!-- Icon Menu END -->
    <!-- Icon Panel START -->
    <div id="palleon-icon-panel">
        <div id="palleon-icon-panel-inner">
            <!-- Similar START -->
            <div id="palleon-Similar" class="palleon-icon-panel-content">
                <ul class="palleon-accordion">
                    
                </ul>
                <hr class="hide-on-canvas-mode" />
                
            </div>
            
            <div id="palleon-adjust" class="palleon-icon-panel-content">
                <ul class="palleon-accordion">
                    <!-- Crop -->
                    <li class="accordion-crop hide-on-canvas-mode">
                        <a href="#"><span class="material-icons accordion-icon">crop</span>Crop<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap label-block">
                                <div class="palleon-control">
                                    <select id="palleon-crop-style" class="palleon-select palleon-select2" autocomplete="off">
                                        <option value="">Please select</option>
                                        <option value="freeform" data-icon="crop_free">Freeform</option>
                                        <option value="custom" data-icon="crop">Custom</option>
                                        <option value="square" data-icon="crop_square">Square</option>
                                        <option value="original" data-icon="crop_original">Original Ratio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="palleon-control-wrap palleon-resize-wrap crop-custom">
                                <input id="palleon-crop-width" class="palleon-form-field" type="number" value="" data-max="" autocomplete="off">
                                <span class="material-icons">clear</span>
                                <input id="palleon-crop-height" class="palleon-form-field" type="number" value="" data-max="" autocomplete="off">
                                <button id="palleon-crop-lock" type="button" class="palleon-btn palleon-lock-unlock hide-on-canvas-mode active"><span class="material-icons">lock</span></button>
                            </div>
                            <div id="palleon-crop-btns" class="palleon-control-wrap palleon-submit-btns disabled">
                                <button id="palleon-crop-apply" type="button" class="palleon-btn primary">Apply</button>
                                <button id="palleon-crop-cancel" type="button" class="palleon-btn">Cancel</button>
                            </div>
                        </div>
                    </li>
                    <!-- Rotate -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">refresh</span>Rotate<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap label-block">
                                <div class="palleon-control">
                                    <div class="palleon-btn-group icon-group">
                                        <button id="palleon-rotate-right" type="button" class="palleon-btn tooltip" data-title="Rotate Right"><span class="material-icons">rotate_right</span></button>
                                        <button id="palleon-rotate-left" type="button" class="palleon-btn tooltip" data-title="Rotate Left"><span class="material-icons">rotate_left</span></button>
                                        <button id="palleon-flip-horizontal" type="button" class="palleon-btn tooltip" data-title="Flip X"><span class="material-icons">flip</span></button>
                                        <button id="palleon-flip-vertical" type="button" class="palleon-btn tooltip" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Resize -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">aspect_ratio</span>Resize<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-resize-wrap">
                                <input id="palleon-resize-width" class="palleon-form-field" type="number" value="" data-size="" autocomplete="off">
                                <span class="material-icons">clear</span>
                                <input id="palleon-resize-height" class="palleon-form-field" type="number" value="" data-size="" autocomplete="off">
                                <button id="palleon-resize-lock" type="button" class="palleon-btn palleon-lock-unlock active"><span class="material-icons">lock</span></button>
                            </div>
                            <button id="palleon-resize-apply" type="button" class="palleon-btn btn-full primary">Apply</button>
                        </div>
                    </li>
                </ul>
                <hr class="hide-on-canvas-mode" />
                <ul class="palleon-accordion hide-on-canvas-mode">
                    <!-- Quick Filters -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">auto_fix_high</span>Quick Filters<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div id="palleon-filters" class="palleon-grid two-column">
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="grayscale" autocomplete="off" class="input-hidden" />
                                    <label for="grayscale"><img class="lazy" data-src="assets/filters/grayscale.png" /><span>Grayscale</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="sepia" autocomplete="off" class="input-hidden" />
                                    <label for="sepia"><img class="lazy" data-src="assets/filters/sepia.png" /><span>Sepia</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="blackwhite" autocomplete="off" class="input-hidden" />
                                    <label for="blackwhite"><img class="lazy" data-src="assets/filters/blackwhite.png" /><span>Black/White</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="brownie" autocomplete="off" class="input-hidden" />
                                    <label for="brownie"><img class="lazy" data-src="assets/filters/brownie.png" /><span>Brownie</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="vintage" autocomplete="off" class="input-hidden" />
                                    <label for="vintage"><img class="lazy" data-src="assets/filters/vintage.png" /><span>Vintage</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="kodachrome" autocomplete="off" class="input-hidden" />
                                    <label for="kodachrome"><img class="lazy" data-src="assets/filters/kodachrome.png" /><span>Kodachrome</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="technicolor" autocomplete="off" class="input-hidden" />
                                    <label for="technicolor"><img class="lazy" data-src="assets/filters/technicolor.png" /><span>Technicolor</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="polaroid" autocomplete="off" class="input-hidden" />
                                    <label for="polaroid"><img class="lazy" data-src="assets/filters/polaroid.png" /><span>Polaroid</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="shift" autocomplete="off" class="input-hidden" />
                                    <label for="shift"><img class="lazy" data-src="assets/filters/shift.png" /><span>Shift</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="invert" autocomplete="off" class="input-hidden" />
                                    <label for="invert"><img class="lazy" data-src="assets/filters/invert.png" /><span>Invert</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="sharpen" autocomplete="off" class="input-hidden" />
                                    <label for="sharpen"><img class="lazy" data-src="assets/filters/sharpen.png" /><span>Sharpen</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="emboss" autocomplete="off" class="input-hidden" />
                                    <label for="emboss"><img class="lazy" data-src="assets/filters/emboss.png" /><span>Emboss</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="sobelX" autocomplete="off" class="input-hidden" />
                                    <label for="sobelX"><img class="lazy" data-src="assets/filters/sobelX.png" /><span>SobelX</span></label>
                                </div>
                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                    <input type="checkbox" name="palleon-filter" id="sobelY" autocomplete="off" class="input-hidden" />
                                    <label for="sobelY"><img class="lazy" data-src="assets/filters/sobelY.png" /><span>SobelY</span></label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Basic Adjust -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">tune</span>Basic Adjust<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Brightness</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-brightness" class="palleon-toggle-checkbox" data-conditional="#palleon-brightness-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-brightness-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Brightness<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="brightness" type="range" min="-1" max="1" value="0" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Contrast</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-contrast" class="palleon-toggle-checkbox" data-conditional="#palleon-contrast-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-contrast-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Contrast<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="contrast" type="range" min="-1" max="1" value="0" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Saturation</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-saturation" class="palleon-toggle-checkbox" data-conditional="#palleon-saturation-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-saturation-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Saturation<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="saturation" type="range" min="-1" max="1" value="0" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Hue</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-hue" class="palleon-toggle-checkbox" data-conditional="#palleon-hue-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-hue-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Hue<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="hue" type="range" min="-2" max="2" value="0" step="0.02" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Gamma -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">wb_sunny</span>Gamma<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Gamma</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-gamma" class="palleon-toggle-checkbox" data-conditional="#palleon-gamma-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-gamma-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Red<span>1</span></label>
                                    <div class="palleon-control">
                                        <input id="gamma-red" type="range" min="0.2" max="2.2" value="1" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Green<span>1</span></label>
                                    <div class="palleon-control">
                                        <input id="gamma-green" type="range" min="0.2" max="2.2" value="1" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Blue<span>1</span></label>
                                    <div class="palleon-control">
                                        <input id="gamma-blue" type="range" min="0.2" max="2.2" value="1" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Blend Color -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">palette</span>Blend Color<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Blend Color</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-blend-color" class="palleon-toggle-checkbox" data-conditional="#palleon-blend-color-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-blend-color-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Mode</label>
                                    <div class="palleon-control">
                                        <select id="blend-color-mode" class="palleon-select" autocomplete="off">
                                            <option selected value="add">Add</option>
                                            <option value="diff">Diff</option>
                                            <option value="subtract">Subtract</option>
                                            <option value="multiply">Multiply</option>
                                            <option value="screen">Screen</option>
                                            <option value="lighten">Lighten</option>
                                            <option value="darken">Darken</option>
                                            <option value="overlay">Overlay</option>
                                            <option value="exclusion">Exclusion</option>
                                            <option value="tint">Tint</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Color</label>
                                    <div class="palleon-control">
                                        <input id="blend-color-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#ffffff" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Alpha<span>0.5</span></label>
                                    <div class="palleon-control">
                                        <input id="blend-color-alpha" type="range" min="0" max="1" value="0.5" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Duotone Effect -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">swap_horiz</span>Duotone Effect<span class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Duotone</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-duotone-color" class="palleon-toggle-checkbox" data-conditional="#palleon-duotone-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-duotone-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Light Color</label>
                                    <div class="palleon-control">
                                        <input id="duotone-light-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="green" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Dark Color</label>
                                    <div class="palleon-control">
                                        <input id="duotone-dark-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="blue" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Swap Colors -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">swap_horiz</span>Swap Colors<span
                                class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Swap Colors</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-swap-colors" class="palleon-toggle-checkbox" data-conditional="#palleon-swap-colors-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-swap-colors-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Source</label>
                                    <div class="palleon-control">
                                        <input id="color-source" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#ffffff" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Destination</label>
                                    <div class="palleon-control">
                                        <input id="color-destination" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000000" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap label-block">
                                    <div class="palleon-control">
                                        <div class="palleon-btn-set">
                                            <button id="palleon-swap-apply" type="button" class="palleon-btn primary">Apply</button>
                                            <button id="palleon-swap-remove" type="button" class="palleon-btn" autocomplete="off" disabled><span class="material-icons">delete</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Advanced Edits -->
                    <li>
                        <a href="#"><span class="material-icons accordion-icon">tune</span>Advanced Edits<span
                                class="material-icons arrow">keyboard_arrow_down</span></a>
                        <div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Blur</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-blur" class="palleon-toggle-checkbox" data-conditional="#palleon-blur-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-blur-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Blur<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="blur" type="range" min="0" max="1" value="0" step="0.01" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Noise</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-noise" class="palleon-toggle-checkbox" data-conditional="#palleon-noise-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-noise-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Noise<span>0</span></label>
                                    <div class="palleon-control">
                                        <input id="noise" type="range" min="0" max="1000" value="0" step="1" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Adjust Pixelate</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-pixelate" class="palleon-toggle-checkbox" data-conditional="#palleon-pixelate-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="palleon-pixelate-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap label-block">
                                    <label class="palleon-control-label slider-label">Pixelate<span>1</span></label>
                                    <div class="palleon-control">
                                        <input id="pixelate" type="range" min="1" max="20" value="1" step="1" class="palleon-slider" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Adjust END -->
            <!-- Frames START -->
            <div id="palleon-frames" class="palleon-icon-panel-content panel-hide">
                <div class="palleon-tabs">
                    <!-- Frames Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#palleon-all-frames">All</li>
                        <li data-target="#palleon-frame-favorites">My Favorites</li>
                        <li data-target="#palleon-frame-options">Settings</li>
                    </ul>
                    <!-- All Frames -->
                    <div id="palleon-all-frames" class="palleon-tab active">
                        <div class="palleon-search-wrap">
                            <input id="palleon-frame-search" type="search" class="palleon-form-field" placeholder="Search Category..." autocomplete="off" />
                            <span id="palleon-frame-search-icon" class="material-icons">search</span>
                        </div>
                        <ul id="palleon-frames-wrap" class="palleon-accordion">
                            <li data-keyword="grunge"><a href="#">Grunge<span class="data-count">12</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-grunge" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star favorited" data-frameid="grunge/2"><span class="material-icons">star</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/7.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/7.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/8.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/8.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/9.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/9.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/10.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/10.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/11.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/11.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge/12.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/12.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="grunge-square"><a href="#">Grunge - Square<span
                                        class="data-count">6</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-grunge-square" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/grunge-square/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge-square/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="grunge-square/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="business"><a href="#">Business<span class="data-count">8</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-business" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/business/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/7.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/7.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/business/8.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/business/8.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="business/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="bohemian"><a href="#">Bohemian<span class="data-count">10</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-bohemian" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star favorited" data-frameid="bohemian/1"><span class="material-icons">star</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/7.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/7.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/8.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/8.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/9.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/9.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/bohemian/10.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/10.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="bohemian/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="abstract"><a href="#">Abstract<span class="data-count">6</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-abstract" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star favorited" data-frameid="abstract/1"><span class="material-icons">star</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="abstract/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="abstract/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="abstract/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="abstract/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/abstract/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="abstract/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="floral"><a href="#">Floral<span class="data-count">5</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-floral" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/floral/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/floral/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="floral/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/floral/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/floral/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="floral/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/floral/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/floral/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="floral/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/floral/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/floral/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="floral/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/floral/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/floral/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="floral/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="neon"><a href="#">Neon<span class="data-count">4</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-neon" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/neon/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/neon/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="neon/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/neon/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/neon/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="neon/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/neon/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/neon/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="neon/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/neon/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/neon/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="neon/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="winter"><a href="#">Winter<span class="data-count">3</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-winter" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/winter/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/winter/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="winter/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/winter/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/winter/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="winter/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/winter/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/winter/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="winter/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="halloween"><a href="#">Halloween<span class="data-count">2</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-halloween" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/halloween/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/halloween/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="halloween/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/halloween/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/halloween/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="halloween/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="cute"><a href="#">Cute<span class="data-count">7</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-cute" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/cute/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/4.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/4.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/5.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/5.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/6.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/6.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/cute/7.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/cute/7.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="cute/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="watercolor"><a href="#">Watercolor<span class="data-count">3</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-watercolor" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/watercolor/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/watercolor/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="watercolor/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/watercolor/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/watercolor/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="watercolor/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/watercolor/3.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/watercolor/3.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="watercolor/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="love"><a href="#">Love<span class="data-count">2</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-love" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/love/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/love/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="love/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-frame" data-elsource="files/frames/love/2.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/love/2.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="love/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="others"><a href="#">Others<span class="data-count">1</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-frames-grid-others" class="palleon-frames-grid paginated" data-perpage="4">
                                        <div class="palleon-frame" data-elsource="files/frames/others/1.svg">
                                            <div class="palleon-img-wrap">
                                                <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/others/1.jpg" />
                                            </div>
                                            <div class="frame-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-frameid="others/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Frames Favorites -->
                    <div id="palleon-frame-favorites" class="palleon-tab">
                        <div class="palleon-frames-grid">
                            <div class="palleon-frame" data-elsource="files/frames/abstract/1.svg">
                                <div class="palleon-img-wrap">
                                    <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/abstract/1.jpg" />
                                </div>
                                <div class="frame-favorite">
                                    <button type="button" class="palleon-btn-simple star favorited" data-frameid="abstract/1"><span class="material-icons">star</span></button>
                                </div>
                            </div>
                            <div class="palleon-frame" data-elsource="files/frames/bohemian/1.svg">
                                <div class="palleon-img-wrap">
                                    <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/bohemian/1.jpg" />
                                </div>
                                <div class="frame-favorite">
                                    <button type="button" class="palleon-btn-simple star favorited" data-frameid="bohemian/1"><span class="material-icons">star</span></button>
                                </div>
                            </div>
                            <div class="palleon-frame" data-elsource="files/frames/grunge/2.svg">
                                <div class="palleon-img-wrap">
                                    <div class="palleon-img-loader"></div><img class="lazy" data-src="files/frames/grunge/2.jpg" />
                                </div>
                                <div class="frame-favorite">
                                    <button type="button" class="palleon-btn-simple star favorited" data-frameid="grunge/2"><span class="material-icons">star</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Frames Options -->
                    <div id="palleon-frame-options" class="palleon-tab">
                        <div class="palleon-control-wrap label-block">
                            <div class="palleon-control">
                                <div class="palleon-btn-group icon-group">
                                    <button id="palleon-rotate-right-frame" type="button" class="palleon-btn tooltip" data-title="Rotate Right"><span class="material-icons">rotate_right</span></button>
                                    <button id="palleon-rotate-left-frame" type="button" class="palleon-btn tooltip" data-title="Rotate Left"><span class="material-icons">rotate_left</span></button>
                                    <button id="palleon-flip-horizontal-frame" type="button" class="palleon-btn tooltip" data-title="Flip X"><span class="material-icons">flip</span></button>
                                    <button id="palleon-flip-vertical-frame" type="button" class="palleon-btn tooltip" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label">Fill Color</label>
                            <div class="palleon-control">
                                <input id="palleon-frame-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                                <div class="palleon-control-desc">May not work properly on multi-color frames.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="palleon-noframes" class="notice notice-warning">Nothing found.</div>
            </div>
            <!-- Frames END -->
            <!-- Text START -->
            <div id="palleon-text" class="palleon-icon-panel-content panel-hide">
                <!-- Add Text Button -->
                <button id="palleon-add-text" type="button" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">add_circle</span>Add Text</button>
                <!-- Text Settings -->
                <div id="palleon-text-settings" class="palleon-sub-settings">
                    <div class="palleon-text-wrap">
                        <div class="palleon-control-wrap label-block">
                            <div class="palleon-control">
                                <div id="palleon-text-format-btns" class="palleon-btn-group icon-group">
                                    <button id="format-uppercase" type="button" class="palleon-btn"><span class="material-icons">text_fields</span></button>
                                    <button id="format-bold" type="button" class="palleon-btn"><span class="material-icons">format_bold</span></button>
                                    <button id="format-italic" type="button" class="palleon-btn"><span class="material-icons">format_italic</span></button>
                                    <button id="format-underlined" type="button" class="palleon-btn"><span class="material-icons">format_underlined</span></button>
                                    <button id="format-align-left" type="button" class="palleon-btn format-align"><span class="material-icons">format_align_left</span></button>
                                    <button id="format-align-center" type="button" class="palleon-btn format-align"><span class="material-icons">format_align_center</span></button>
                                    <button id="format-align-right" type="button" class="palleon-btn format-align"><span class="material-icons">format_align_right</span></button>
                                    <button id="format-align-justify" type="button" class="palleon-btn format-align"><span class="material-icons">format_align_justify</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <div class="palleon-control">
                                <textarea id="palleon-text-input" class="palleon-form-field" rows="2" autocomplete="off">Enter Your Text Here</textarea>
                            </div>
                        </div>
                        <hr />
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label">Font Family</label>
                            <div class="palleon-control">
                                <select id="palleon-font-family" class="palleon-select palleon-select2" autocomplete="off" data-loadFont="yes">
                                    <optgroup id="websafe-fonts" label="Default Fonts"></optgroup>
                                    <optgroup id="google-fonts" label="Google Fonts"></optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Font Size</label>
                            <div class="palleon-control">
                                <input id="palleon-font-size" class="palleon-form-field" type="number" value="60" data-min="1" data-max="1000" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Line Height</label>
                            <div class="palleon-control">
                                <input id="palleon-line-height" class="palleon-form-field" type="number" value="1.2" data-min="0.1" data-max="10" step="0.1" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Letter Spacing</label>
                            <div class="palleon-control">
                                <input id="palleon-letter-spacing" class="palleon-form-field" type="number" value="0" data-max="1000" step="100" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Fill Style</label>
                            <div class="palleon-control">
                                <select id="palleon-text-gradient" class="palleon-select" autocomplete="off">
                                    <option value="none" selected>Solid Color</option>
                                    <option value="vertical">Vertical Gradient</option>
                                    <option value="horizontal">Horizontal Gradient</option>
                                </select>
                            </div>
                        </div>
                        <div id="text-gradient-settings">
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color 1</label>
                                <div class="palleon-control">
                                    <input id="text-gradient-color-1" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#9C27B0" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color 2</label>
                                <div class="palleon-control">
                                    <input id="text-gradient-color-2" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000000" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color 3</label>
                                <div class="palleon-control">
                                    <input id="text-gradient-color-3" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color 4</label>
                                <div class="palleon-control">
                                    <input id="text-gradient-color-4" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                                </div>
                            </div>
                        </div>
                        <div id="text-fill-color" class="palleon-control-wrap">
                            <label class="palleon-control-label">Color</label>
                            <div class="palleon-control">
                                <input id="palleon-text-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Outline Size</label>
                            <div class="palleon-control">
                                <input id="palleon-outline-size" class="palleon-form-field" type="number" value="0" data-min="0" data-max="100" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Outline Color</label>
                            <div class="palleon-control">
                                <input id="palleon-outline-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#fff" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Background</label>
                            <div class="palleon-control">
                                <input id="palleon-text-background" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap conditional">
                            <label class="palleon-control-label">Text Shadow</label>
                            <div class="palleon-control palleon-toggle-control">
                                <label class="palleon-toggle">
                                    <input id="palleon-text-shadow" class="palleon-toggle-checkbox" data-conditional="#text-shadow-settings" type="checkbox" autocomplete="off" />
                                    <div class="palleon-toggle-switch"></div>
                                </label>
                            </div>
                        </div>
                        <div id="text-shadow-settings" class="d-none conditional-settings">
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Shadow Color</label>
                                <div class="palleon-control">
                                    <input id="text-shadow-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Shadow Blur</label>
                                <div class="palleon-control">
                                    <input id="text-shadow-blur" class="palleon-form-field" type="number" value="5" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset X</label>
                                <div class="palleon-control">
                                    <input id="text-shadow-offset-x" class="palleon-form-field" type="number" value="5" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset Y</label>
                                <div class="palleon-control">
                                    <input id="text-shadow-offset-y" class="palleon-form-field" type="number" value="5" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="palleon-control-wrap label-block">
                            <div class="palleon-control">
                                <div id="palleon-text-flip-btns" class="palleon-btn-group icon-group">
                                    <button id="text-flip-x" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip X"><span class="material-icons">flip</span></button>
                                    <button id="text-flip-y" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                    <button type="button" class="palleon-horizontal-center palleon-btn tooltip tooltip-top" data-title="H-Align Center"><span class="material-icons">align_horizontal_center</span></button>
                                    <button type="button" class="palleon-vertical-center palleon-btn tooltip tooltip-top" data-title="V-Align Center"><span class="material-icons">vertical_align_center</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label slider-label">Opacity<span>1</span></label>
                            <div class="palleon-control">
                                <input id="text-opacity" type="range" min="0" max="1" value="1" step="0.1" class="palleon-slider" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label slider-label">Skew X<span>0</span></label>
                            <div class="palleon-control">
                                <input id="text-skew-x" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label slider-label">Skew Y<span>0</span></label>
                            <div class="palleon-control">
                                <input id="text-skew-y" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label slider-label">Rotate<span>0</span></label>
                            <div class="palleon-control">
                                <input id="text-rotate" type="range" min="0" max="360" value="0" step="1" class="palleon-slider" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Text END -->
            <!-- Image START -->
            <div id="palleon-image" class="palleon-icon-panel-content panel-hide">
                <div class="palleon-tabs">
                    <ul class="palleon-tabs-menu">
                        <li id="palleon-img-mode" class="active" data-target="#palleon-image-mode">Image</li>
                        <li data-target="#palleon-overlay-image-mode">Overlay Image</li>
                    </ul>
                    <div id="palleon-image-mode" class="palleon-tab active">
                        <!-- Upload Image Button -->
                        <div class="palleon-file-field">
                            <input type="file" name="palleon-file" id="palleon-img-upload" class="palleon-hidden-file" accept="image/png, image/jpeg, image/webp" />
                            <label for="palleon-img-upload" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">upload</span><span>Upload from computer</span></label>
                        </div>
                        <!-- Media Library Button -->
                        <button id="palleon-img-media-library" type="button" class="palleon-btn primary palleon-lg-btn btn-full palleon-modal-open" data-target="#modal-media-library"><span class="material-icons">photo_library</span>Select From Media Library</button>
                        <!-- Image Settings -->
                        <div id="palleon-image-settings" class="palleon-sub-settings">
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Border Width</label>
                                <div class="palleon-control">
                                    <input id="img-border-width" class="palleon-form-field" type="number" value="0" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Border Color</label>
                                <div class="palleon-control">
                                    <input id="img-border-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#ffffff" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Rounded Corners<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="img-border-radius" type="range" min="0" max="1000" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Shadow</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-image-shadow" class="palleon-toggle-checkbox" data-conditional="#image-shadow-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="image-shadow-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Shadow Color</label>
                                    <div class="palleon-control">
                                        <input id="image-shadow-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Shadow Blur</label>
                                    <div class="palleon-control">
                                        <input id="image-shadow-blur" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Offset X</label>
                                    <div class="palleon-control">
                                        <input id="image-shadow-offset-x" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Offset Y</label>
                                    <div class="palleon-control">
                                        <input id="image-shadow-offset-y" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="palleon-control-wrap label-block">
                                <div class="palleon-control">
                                    <div class="palleon-btn-group icon-group">
                                        <button id="img-flip-horizontal" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip X"><span class="material-icons">flip</span></button>
                                        <button id="img-flip-vertical" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                        <button type="button" class="palleon-horizontal-center palleon-btn tooltip tooltip-top" data-title="H-Align Center"><span class="material-icons">align_horizontal_center</span></button>
                                        <button type="button" class="palleon-vertical-center palleon-btn tooltip tooltip-top" data-title="V-Align Center"><span class="material-icons">vertical_align_center</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Opacity<span>1</span></label>
                                <div class="palleon-control">
                                    <input id="img-opacity" type="range" min="0" max="1" value="1" step="0.1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew X<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="img-skew-x" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew Y<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="img-skew-y" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Rotate<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="img-rotate" type="range" min="0" max="360" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <hr />
                            <button id="palleon-img-replace-media-library" type="button" class="palleon-btn palleon-lg-btn btn-full palleon-modal-open" data-target="#modal-media-library"><span class="material-icons">photo_library</span>Replace Image
                            </button>
                        </div>
                    </div>
                    <div id="palleon-overlay-image-mode" class="palleon-tab">
                        <div class="palleon-file-field">
                            <input type="file" name="palleon-file" id="palleon-overlay-img-upload" class="palleon-hidden-file" accept="image/png, image/jpeg, image/webp" />
                            <label for="palleon-overlay-img-upload" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">upload</span><span>Upload from computer</span></label>
                        </div>
                        <button id="palleon-overlay-img-media-library" type="button" class="palleon-btn primary palleon-lg-btn btn-full palleon-modal-open" data-target="#modal-media-library"><span class="material-icons">photo_library</span>Select From Media Library</button>
                        <div class="notice notice-warning">It is useful only if your PNG image has transparent parts and the size of the image (or the aspect ratio) is equal to the canvas. The overlay image will over all objects on the canvas and will be stretched to fit the canvas.</div>
                        <div id="palleon-overlay-wrap">
                            <img id="palleon-overlay-preview" src="" />
                            <button id="palleon-overlay-delete" type="button" class="palleon-btn palleon-lg-btn btn-full"><span class="material-icons">delete</span>Remove Overlay Image</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image END -->
            <!-- Shapes START -->
            <div id="palleon-shapes" class="palleon-icon-panel-content panel-hide">
                 <!-- Select Shape -->
                <div class="palleon-select-btn-set">
                    <select id="palleon-shape-select" class="palleon-select" autocomplete="off">
                        <option value="none" selected>Select Shape</option>
                        <option value="circle">Circle</option>
                        <option value="ellipse">Ellipse</option>
                        <option value="square">Square</option>
                        <option value="rectangle">Rectangle</option>
                        <option value="triangle">Triangle</option>
                        <option value="trapezoid">Trapezoid</option>
                        <option value="pentagon">Pentagon</option>
                        <option value="octagon">Octagon</option>
                        <option value="emerald">Emerald</option>
                        <option value="star">Star</option>
                    </select>
                    <button id="palleon-shape-add" class="palleon-btn primary" autocomplete="off" disabled><span class="material-icons">add_circle</span></button>
                </div>
                 <!-- Shape Settings -->
                <div id="palleon-shape-settings" class="palleon-sub-settings">
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Fill Style</label>
                        <div class="palleon-control">
                            <select id="palleon-shape-gradient" class="palleon-select" autocomplete="off">
                                <option value="none" selected>Solid Color</option>
                                <option value="vertical">Vertical Gradient</option>
                                <option value="horizontal">Horizontal Gradient</option>
                            </select>
                        </div>
                    </div>
                    <div id="shape-gradient-settings">
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Color 1</label>
                            <div class="palleon-control">
                                <input id="shape-gradient-color-1" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#9C27B0" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Color 2</label>
                            <div class="palleon-control">
                                <input id="shape-gradient-color-2" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000000" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Color 3</label>
                            <div class="palleon-control">
                                <input id="shape-gradient-color-3" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Color 4</label>
                            <div class="palleon-control">
                                <input id="shape-gradient-color-4" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                            </div>
                        </div>
                    </div>
                    <div id="shape-fill-color" class="palleon-control-wrap">
                        <label class="palleon-control-label">Fill Color</label>
                        <div class="palleon-control">
                            <input id="palleon-shape-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="#fff" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Outline Size</label>
                        <div class="palleon-control">
                            <input id="shape-outline-width" class="palleon-form-field" type="number" value="0" data-min="0" data-max="1000" step="1" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Outline Color</label>
                        <div class="palleon-control">
                            <input id="shape-outline-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000000" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap conditional">
                        <label class="palleon-control-label">Shadow</label>
                        <div class="palleon-control palleon-toggle-control">
                            <label class="palleon-toggle">
                                <input id="palleon-shape-shadow" class="palleon-toggle-checkbox" data-conditional="#shape-shadow-settings" type="checkbox" autocomplete="off" />
                                <div class="palleon-toggle-switch"></div>
                            </label>
                        </div>
                    </div>
                    <div id="shape-shadow-settings" class="d-none conditional-settings">
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Shadow Color</label>
                            <div class="palleon-control">
                                <input id="shape-shadow-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Shadow Blur</label>
                            <div class="palleon-control">
                                <input id="shape-shadow-blur" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Offset X</label>
                            <div class="palleon-control">
                                <input id="shape-shadow-offset-x" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Offset Y</label>
                            <div class="palleon-control">
                                <input id="shape-shadow-offset-y" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="palleon-control-wrap label-block">
                        <div class="palleon-control">
                            <div class="palleon-btn-group icon-group">
                                <button type="button" class="palleon-horizontal-center palleon-btn tooltip tooltip-top" data-title="Horizontal Align Center"><span class="material-icons">align_horizontal_center</span></button>
                                <button type="button" class="palleon-vertical-center palleon-btn tooltip tooltip-top" data-title="Vertical Align Center"><span class="material-icons">vertical_align_center</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Opacity<span>1</span></label>
                        <div class="palleon-control">
                            <input id="shape-opacity" type="range" min="0" max="1" value="1" step="0.1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Skew X<span>0</span></label>
                        <div class="palleon-control">
                            <input id="shape-skew-x" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Skew Y<span>0</span></label>
                        <div class="palleon-control">
                            <input id="shape-skew-y" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Rotate<span>0</span></label>
                        <div class="palleon-control">
                            <input id="shape-rotate" type="range" min="0" max="360" value="0" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div id="shape-custom-width-wrap">
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Custom Width</label>
                            <div class="palleon-control">
                                <input id="shape-custom-width" class="palleon-form-field" type="number" value="" data-min="0" data-max="10000" step="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap">
                            <label class="palleon-control-label">Custom Height</label>
                            <div class="palleon-control">
                                <input id="shape-custom-height" class="palleon-form-field" type="number" value="" data-min="0" data-max="10000" step="1" autocomplete="off">
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label">Aspect Ratio</label>
                            <div class="palleon-control">
                                <div class="palleon-aspect-ratio">
                                    <input id="palleon-shape-ratio-w" class="palleon-form-field" type="number" value="12" autocomplete="off">
                                    <span class="material-icons">clear</span>
                                    <input id="palleon-shape-ratio-h" class="palleon-form-field" type="number" value="16" autocomplete="off">
                                    <button id="palleon-shape-ratio-lock" type="button" class="palleon-btn palleon-lock-unlock"><span class="material-icons">lock_open</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Shapes END -->
            <!-- Elements START -->
            <div id="palleon-elements" class="palleon-icon-panel-content panel-hide">
                <div class="palleon-tabs">
                    <!-- Elements Menu -->
                    <ul class="palleon-tabs-menu">
                        <li id="palleon-all-elements-open" class="active" data-target="#palleon-all-elements">All</li>
                        <li data-target="#palleon-my-favorites">My Favorites</li>
                        <li id="palleon-custom-element-open" data-target="#palleon-custom-element">Settings</li>
                    </ul>
                    <!-- All Elements -->
                    <div id="palleon-all-elements" class="palleon-tab active">
                        <div class="palleon-search-wrap">
                            <input id="palleon-element-search" type="search" class="palleon-form-field" placeholder="Search Category..." autocomplete="off" />
                            <span id="palleon-element-search-icon" class="material-icons">search</span>
                        </div>
                        <ul id="palleon-elements-wrap" class="palleon-accordion">
                            <li data-keyword="ink-brush-strokes"><a>Ink Brush Strokes<span
                                        class="data-count">21</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-ink-brush-strokes" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/ink-brush-strokes/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/10.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/11.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/12.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/13.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/14.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/15.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/16.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/17.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/18.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/19.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/20.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/ink-brush-strokes/21.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/ink-brush-strokes/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="ink-brush-strokes/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="abstract-shapes"><a>Abstract Shapes<span class="data-count">52</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-abstract-shapes" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/44.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/45.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/46.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/47.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/48.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/49.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/49.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/49"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/50.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/50.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/50"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/51.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/51.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/51"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/abstract-shapes/52.svg" data-loader="no"><img class="lazy" data-src="files/elements/abstract-shapes/52.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="abstract-shapes/52"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="geometric-shapes"><a>Geometric Shapes<span
                                        class="data-count">21</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-geometric-shapes" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/geometric-shapes/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/geometric-shapes/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="geometric-shapes/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="shape-badges"><a>Shapes &amp; Badges<span
                                        class="data-count">36</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-shape-badges" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/shape-badges/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/shape-badges/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="shape-badges/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="hand-drawn-dividers"><a>Hand Drawn Dividers<span
                                        class="data-count">30</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-hand-drawn-dividers" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/1.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/2.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/3.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/4.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/5.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/6.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/7.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/8.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/9.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/10.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/11.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/12.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/13.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/14.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/15.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/16.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/17.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/18.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/19.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/20.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/21.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/22.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/23.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/24.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/25.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/26.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/27.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/28.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/29.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/hand-drawn-dividers/30.svg" data-loader="no">
                                            <img class="lazy" data-src="files/elements/hand-drawn-dividers/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="hand-drawn-dividers/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="arrows"><a>Arrows<span class="data-count">31</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-arrows" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/arrows/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/arrows/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="arrows/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="speech-bubbles"><a>Speech Bubbles<span class="data-count">41</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-speech-bubbles" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/speech-bubbles/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/speech-bubbles/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="speech-bubbles/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="clouds"><a>Clouds<span class="data-count">41</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-clouds" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/clouds/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/clouds/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="clouds/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="social-media"><a>Social Media<span class="data-count">55</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-social-media" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/44.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/45.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/46.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/47.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/48.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/49.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/49.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/49"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/50.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/50.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/50"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/51.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/51.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/51"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/52.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/52.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/52"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/53.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/53.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/53"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/54.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/54.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/54"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/social-media/55.svg" data-loader="no"><img class="lazy" data-src="files/elements/social-media/55.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="social-media/55"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="payment"><a>Payment<span class="data-count">80</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-payment" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/payment/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/44.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/45.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/46.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/47.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/48.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/49.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/49.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/49"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/50.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/50.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/50"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/51.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/51.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/51"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/52.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/52.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/52"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/53.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/53.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/53"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/54.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/54.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/54"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/55.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/55.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/55"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/56.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/56.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/56"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/57.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/57.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/57"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/58.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/58.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/58"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/59.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/59.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/59"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/60.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/60.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/60"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/61.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/61.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/61"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/62.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/62.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/62"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/63.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/63.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/63"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/64.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/64.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/64"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/65.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/65.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/65"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/66.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/66.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/66"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/67.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/67.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/67"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/68.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/68.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/68"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/69.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/69.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/69"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/70.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/70.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/70"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/71.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/71.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/71"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/72.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/72.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/72"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/73.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/73.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/73"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/74.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/74.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/74"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/75.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/75.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/75"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/76.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/76.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/76"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/77.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/77.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/77"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/78.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/78.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/78"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/79.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/79.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/79"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/payment/80.svg" data-loader="no"><img class="lazy" data-src="files/elements/payment/80.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="payment/80"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="crypto"><a>Crypto Currency<span class="data-count">56</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-crypto" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/44.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/45.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/46.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/47.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/48.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/49.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/49.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/49"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/50.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/50.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/50"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/51.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/51.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/51"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/52.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/52.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/52"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/53.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/53.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/53"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/54.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/54.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/54"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/55.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/55.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/55"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/crypto/56.svg" data-loader="no"><img class="lazy" data-src="files/elements/crypto/56.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="crypto/56"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="avatars"><a>Avatars<span class="data-count">25</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-avatars" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/avatars/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/avatars/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="avatars/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="people"><a>People<span class="data-count">43</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-people" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/people/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/people/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/people/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="people/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="dividers"><a>Dividers<span class="data-count">25</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-dividers" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/dividers/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/dividers/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="dividers/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="trees"><a>Trees<span class="data-count">23</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-trees" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/trees/1.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/2.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/3.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/4.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/5.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/6.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/7.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/8.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/9.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/10.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/11.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/12.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/13.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/14.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/15.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/16.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/17.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/18.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/19.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/20.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/21.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/22.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/trees/23.svg" data-loader="yes"><img class="lazy" data-src="files/elements/trees/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="trees/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="animals"><a>Animals<span class="data-count">48</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-animals" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/animals/1.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/2.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/3.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/4.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/5.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/6.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/7.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/8.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/9.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/10.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/11.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/12.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/13.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/14.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/15.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/16.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/17.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/18.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/19.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/20.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/21.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/22.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/23.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/24.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/25.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/26.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/27.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/28.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/29.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/30.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/31.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/32.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/33.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/34.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/35.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/36.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/37.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/38.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/39.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/40.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/41.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/42.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/43.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/44.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/45.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/46.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/47.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/animals/48.svg" data-loader="yes"><img class="lazy" data-src="files/elements/animals/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="animals/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="vehicles"><a>Vehicles<span class="data-count">9</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-vehicles" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/vehicles/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/vehicles/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="vehicles/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="quote"><a>Quote<span class="data-count">12</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-quote" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/quote/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/quote/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/quote/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="quote/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="weather"><a>Weather<span class="data-count">71</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-weather" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/weather/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/26.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/26.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/26"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/27.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/27.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/27"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/28.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/28.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/28"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/29.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/29.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/29"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/30.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/30.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/30"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/31.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/31.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/31"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/32.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/32.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/32"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/33.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/33.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/33"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/34.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/34.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/34"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/35.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/35.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/35"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/36.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/36.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/36"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/37.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/37.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/37"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/38.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/38.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/38"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/39.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/39.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/39"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/40.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/40.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/40"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/41.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/41.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/41"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/42.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/42.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/42"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/43.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/43.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/43"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/44.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/44.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/44"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/45.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/45.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/45"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/46.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/46.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/46"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/47.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/47.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/47"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/48.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/48.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/48"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/49.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/49.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/49"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/50.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/50.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/50"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/51.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/51.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/51"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/52.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/52.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/52"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/53.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/53.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/53"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/54.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/54.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/54"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/55.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/55.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/55"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/56.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/56.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/56"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/57.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/57.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/57"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/58.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/58.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/58"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/59.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/59.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/59"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/60.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/60.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/60"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/61.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/61.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/61"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/62.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/62.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/62"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/63.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/63.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/63"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/64.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/64.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/64"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/65.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/65.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/65"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/66.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/66.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/66"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/67.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/67.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/67"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/68.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/68.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/68"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/69.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/69.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/69"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/70.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/70.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/70"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weather/71.svg" data-loader="no"><img class="lazy" data-src="files/elements/weather/71.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weather/71"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="weapons"><a>Weapons<span class="data-count">25</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-weapons" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/17.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/17.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/17"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/18.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/18.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/18"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/19.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/19.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/19"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/20.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/20.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/20"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/21.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/21.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/21"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/22.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/22.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/22"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/23.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/23.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/23"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/24.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/24.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/24"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element light" data-elsource="files/elements/weapons/25.svg" data-loader="no"><img class="lazy" data-src="files/elements/weapons/25.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="weapons/25"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li data-keyword="gifts"><a>Gifts<span class="data-count">16</span><span
                                        class="material-icons arrow">keyboard_arrow_down</span></a>
                                <div>
                                    <div id="palleon-elements-grid-gifts" class="palleon-grid palleon-elements-grid four-column paginated" data-perpage="12">
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/1.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/1.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/1"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/2.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/2.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/2"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/3.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/3.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/3"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/4.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/4.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/4"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/5.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/5.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/5"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/6.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/6.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/6"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/7.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/7.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/7"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/8.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/8.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/8"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/9.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/9.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/9"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/10.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/10.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/10"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/11.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/11.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/11"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/12.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/12.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/12"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/13.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/13.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/13"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/14.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/14.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/14"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/15.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/15.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/15"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                        <div class="palleon-element dark" data-elsource="files/elements/gifts/16.svg" data-loader="no"><img class="lazy" data-src="files/elements/gifts/16.svg" />
                                            <div class="element-favorite">
                                                <button type="button" class="palleon-btn-simple star " data-elementid="gifts/16"><span class="material-icons">star_border</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Elements Favorites -->
                    <div id="palleon-my-favorites" class="palleon-tab">
                        <div class="palleon-grid palleon-elements-grid five-column">
                            <div class="notice notice-info">
                                <h6>No favorites yet</h6>Click the star icon on any element, and you will see it here next time you visit.
                            </div>
                        </div>
                    </div>
                    <!-- Custom Element Settings -->
                    <div id="palleon-custom-element" class="palleon-tab">
                        <div id="palleon-custom-element-options-info" class="notice notice-info">
                            <h6>No element is selected</h6> Select an element to adjust the settings.
                        </div>
                        <div id="palleon-custom-element-options">
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Fill Style</label>
                                <div class="palleon-control">
                                    <select id="palleon-element-gradient" class="palleon-select" autocomplete="off">
                                        <option value="none" selected>Solid Color</option>
                                        <option value="vertical">Vertical Gradient</option>
                                        <option value="horizontal">Horizontal Gradient</option>
                                    </select>
                                </div>
                            </div>
                            <div id="element-gradient-settings">
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Color 1</label>
                                    <div class="palleon-control">
                                        <input id="element-gradient-color-1" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#9C27B0" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Color 2</label>
                                    <div class="palleon-control">
                                        <input id="element-gradient-color-2" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000000" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Color 3</label>
                                    <div class="palleon-control">
                                        <input id="element-gradient-color-3" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap control-text-color">
                                    <label class="palleon-control-label">Color 4</label>
                                    <div class="palleon-control">
                                        <input id="element-gradient-color-4" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                                    </div>
                                </div>
                            </div>
                            <div id="element-fill-color" class="palleon-control-wrap">
                                <label class="palleon-control-label">Fill Color</label>
                                <div class="palleon-control">
                                    <input id="palleon-element-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="" />
                                </div>
                            </div>
                            <div class="palleon-control-wrap conditional">
                                <label class="palleon-control-label">Shadow</label>
                                <div class="palleon-control palleon-toggle-control">
                                    <label class="palleon-toggle">
                                        <input id="palleon-element-shadow" class="palleon-toggle-checkbox" data-conditional="#element-shadow-settings" type="checkbox" autocomplete="off" />
                                        <div class="palleon-toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                            <div id="element-shadow-settings" class="d-none conditional-settings">
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Shadow Color</label>
                                    <div class="palleon-control">
                                        <input id="element-shadow-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#000" />
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Shadow Blur</label>
                                    <div class="palleon-control">
                                        <input id="element-shadow-blur" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Offset X</label>
                                    <div class="palleon-control">
                                        <input id="element-shadow-offset-x" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="palleon-control-wrap">
                                    <label class="palleon-control-label">Offset Y</label>
                                    <div class="palleon-control">
                                        <input id="element-shadow-offset-y" class="palleon-form-field" type="number" value="5" step="1" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="palleon-control-wrap label-block">
                                <div class="palleon-control">
                                    <div class="palleon-btn-group icon-group">
                                        <button id="element-flip-horizontal" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip X"><span class="material-icons">flip</span></button>
                                        <button id="element-flip-vertical" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                        <button type="button" class="palleon-horizontal-center palleon-btn tooltip tooltip-top" data-title="H-Align Center"><span class="material-icons">align_horizontal_center</span></button>
                                        <button type="button" class="palleon-vertical-center palleon-btn tooltip tooltip-top" data-title="V-Align Center"><span class="material-icons">vertical_align_center</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Opacity<span>1</span></label>
                                <div class="palleon-control">
                                    <input id="element-opacity" type="range" min="0" max="1" value="1" step="0.1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew X<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="element-skew-x" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew Y<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="element-skew-y" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Rotate<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="element-rotate" type="range" min="0" max="360" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="palleon-noelements" class="notice notice-warning">Nothing found.</div>
            </div>
            <!-- Elements END -->
            <!-- Icons START -->
            <div id="palleon-icons" class="palleon-icon-panel-content panel-hide">
                <div class="palleon-tabs">
                    <!-- Icons Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#palleon-all-icons">Icons</li>
                        <li id="palleon-custom-svg-open" data-target="#palleon-customsvg-upload">Custom SVG</li>
                    </ul>
                    <!-- All Icons -->
                    <div id="palleon-all-icons" class="palleon-tab active">
                        <div class="palleon-control-wrap" style="margin:0px;">
                            <label class="palleon-control-label">Icon Style</label>
                            <div class="palleon-control">
                                <select id="palleon-icon-style" class="palleon-select" autocomplete="off">
                                    <option selected value="materialicons">Filled</option>
                                    <option value="materialiconsoutlined">Outlined</option>
                                    <option value="materialiconsround">Round</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="palleon-search-wrap">
                            <input id="palleon-icon-search" type="search" class="palleon-form-field" placeholder="Enter a keyword..." autocomplete="off" />
                            <span id="palleon-icon-search-icon" class="material-icons">search</span>
                        </div>
                        <div id="palleon-icons-grid" class="palleon-grid palleon-elements-grid four-column">
                        </div>
                        <div id="palleon-noicons" class="notice notice-warning">Nothing found.</div>
                    </div>
                    <!-- Custom SVG -->
                    <div id="palleon-customsvg-upload" class="palleon-tab">
                        <div class="palleon-file-field">
                            <input type="file" name="palleon-element-upload" id="palleon-element-upload" class="palleon-hidden-file" accept="image/svg+xml" />
                            <label for="palleon-element-upload" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">upload</span><span>Upload SVG from computer</span></label>
                        </div>
                        <button id="palleon-svg-media-library" type="button" class="palleon-btn primary palleon-lg-btn btn-full palleon-modal-open" data-target="#modal-svg-library"><span class="material-icons">photo_library</span>Select From Media Library</button>
                        <!-- Custom SVG Options -->
                        <div id="palleon-custom-svg-options">
                            <hr/>
                            <div class="palleon-control-wrap label-block">
                                <div class="palleon-control">
                                    <div class="palleon-btn-group icon-group">
                                        <button id="customsvg-flip-horizontal" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip X"><span class="material-icons">flip</span></button>
                                        <button id="customsvg-flip-vertical" type="button" class="palleon-btn tooltip tooltip-top" data-title="Flip Y"><span class="material-icons">flip</span></button>
                                        <button type="button" class="palleon-horizontal-center palleon-btn tooltip tooltip-top" data-title="H-Align Center"><span class="material-icons">align_horizontal_center</span></button>
                                        <button type="button" class="palleon-vertical-center palleon-btn tooltip tooltip-top" data-title="V-Align Center"><span class="material-icons">vertical_align_center</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Opacity<span>1</span></label>
                                <div class="palleon-control">
                                    <input id="customsvg-opacity" type="range" min="0" max="1" value="1" step="0.1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew X<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="customsvg-skew-x" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Skew Y<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="customsvg-skew-y" type="range" min="0" max="180" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap label-block">
                                <label class="palleon-control-label slider-label">Rotate<span>0</span></label>
                                <div class="palleon-control">
                                    <input id="customsvg-rotate" type="range" min="0" max="360" value="0" step="1" class="palleon-slider" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Icons END -->
            <!-- QR Code START -->
            <div id="palleon-qrcode" class="palleon-icon-panel-content panel-hide">
                <div id="palleon-qrcode-settings">
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Preview</label>
                        <div class="palleon-control">
                            <div id="qrcode-preview"></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Text</label>
                        <div class="palleon-control">
                            <input type="text" id="palleon-qrcode-text" class="palleon-form-field" autocomplete="off" value="https://mysite.com" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap control-text-color">
                        <label class="palleon-control-label">Fill Color</label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-fill" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#333333" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap control-text-color">
                        <label class="palleon-control-label">Background Color</label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-back" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#FFFFFF" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Rounded Corners<span>0</span></label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-rounded" type="range" min="0" max="100" value="0" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <hr/>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Label</label>
                        <div class="palleon-control">
                            <input type="text" id="palleon-qrcode-label" class="palleon-form-field" autocomplete="off" value="" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap control-text-color">
                        <label class="palleon-control-label">Label Color</label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-label-color" type="text" class="palleon-colorpicker disallow-empty" autocomplete="off" value="#333333" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Label Size<span>30</span></label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-label-size" type="range" min="0" max="100" value="30" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Label Position X<span>50</span></label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-label-position-x" type="range" min="0" max="100" value="50" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Label Position Y<span>50</span></label>
                        <div class="palleon-control">
                            <input id="palleon-qrcode-label-position-y" type="range" min="0" max="100" value="50" step="1" class="palleon-slider" autocomplete="off">
                        </div>
                    </div>
                </div>
                <hr/>
                <button id="palleon-generate-qr-code" type="button" class="palleon-btn primary palleon-lg-btn btn-full"><span class="material-icons">qr_code</span>Generate QR Code</button>
            </div>
             <!-- QR Code END -->
            <!-- Drawing START -->
            <div id="palleon-draw" class="palleon-icon-panel-content panel-hide">
                <!-- Start Drawing Button -->
                <div class="palleon-btn-set">
                    <button id="palleon-draw-btn" type="button" class="palleon-btn primary palleon-lg-btn"><span class="material-icons">edit</span>Start Drawing</button>
                    <button id="palleon-draw-undo" type="button" class="palleon-btn palleon-lg-btn" autocomplete="off" title="Undo" disabled><span class="material-icons">undo</span></button>
                </div>
                <!-- Drawing Setings -->
                <div id="palleon-draw-settings" class="palleon-sub-settings">
                    <div id="palleon-brush-tip" class="notice notice-info">
                        You can draw a straight line by pressing the shift key.
                    </div>
                    <div id="palleon-eraser-tip" class="notice notice-info">
                        You can click undo button to activate invert erasing mode.
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Brush Type</label>
                        <div class="palleon-control">
                            <select id="palleon-brush-select" class="palleon-select" autocomplete="off">
                                <option value="pencil" selected>Pencil</option>
                                <option value="circle">Circle</option>
                                <option value="spray">Spray</option>
                                <option value="hline">H-line Pattern</option>
                                <option value="vline">V-line Pattern</option>
                                <option value="square">Square Pattern</option>
                                <option value="erase">Erase BG Image</option>
                            </select>
                        </div>
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Brush Width</label>
                        <div class="palleon-control">
                            <input id="brush-width" class="palleon-form-field numeric-field" type="number" value="50" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="palleon-brush-pattern-width" class="palleon-control-wrap">
                        <label class="palleon-control-label">Pattern Width</label>
                        <div class="palleon-control">
                            <input id="brush-pattern-width" class="palleon-form-field numeric-field" type="number" value="10" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="palleon-brush-pattern-distance" class="palleon-control-wrap">
                        <label class="palleon-control-label">Pattern Distance</label>
                        <div class="palleon-control">
                            <input id="brush-pattern-distance" class="palleon-form-field numeric-field" type="number" value="5" autocomplete="off" data-min="1" data-max="1000" data-step="1">
                        </div>
                    </div>
                    <div id="not-erase-brush">
                        <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Brush Color</label>
                            <div class="palleon-control">
                                <input id="brush-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="#ffffff" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap conditional">
                            <label class="palleon-control-label">Brush Shadow</label>
                            <div class="palleon-control palleon-toggle-control">
                                <label class="palleon-toggle">
                                    <input id="palleon-brush-shadow" class="palleon-toggle-checkbox" data-conditional="#line-shadow-settings" type="checkbox" autocomplete="off" />
                                    <div class="palleon-toggle-switch"></div>
                                </label>
                            </div>
                        </div>
                        <div id="line-shadow-settings" class="d-none conditional-settings">
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Blur</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-width" class="palleon-form-field" type="number" value="5" data-min="0" data-max="1000" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset X</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-shadow-offset-x" class="palleon-form-field" type="number" value="5" data-min="0" data-max="100" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap">
                                <label class="palleon-control-label">Offset Y</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-shadow-offset-y" class="palleon-form-field" type="number" value="5" data-min="0" data-max="100" step="1" autocomplete="off">
                                </div>
                            </div>
                            <div class="palleon-control-wrap control-text-color">
                                <label class="palleon-control-label">Color</label>
                                <div class="palleon-control">
                                    <input id="brush-shadow-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="#000000" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Drawing END -->
            <!-- Settings START -->
            <div id="palleon-settings" class="palleon-icon-panel-content panel-hide">
                <div class="palleon-control-wrap control-text-color">
                    <label class="palleon-control-label">Canvas Background</label>
                    <div class="palleon-control">
                        <input id="custom-image-background" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                    </div>
                </div>
                <hr />
                <h5>Preferences</h5>
                <div id="palleon-preferences">
                    <div class="palleon-control-wrap label-block">
                        <label class="palleon-control-label slider-label">Font Size<span>14</span></label>
                        <div class="palleon-control">
                            <input id="custom-font-size" type="range" min="10" max="18" value="14" step="1" class="palleon-slider preference" autocomplete="off">
                        </div>
                    </div>
                    <div class="palleon-control-wrap">
                        <label class="palleon-control-label">Theme</label>
                        <div class="palleon-control">
                            <select id="custom-theme" class="palleon-select preference" autocomplete="off">
                                <option value="dark" selected>Dark</option>
                                <option value="light">Light</option>
                            </select>
                        </div>
                    </div>
                    <div class="palleon-control-wrap control-text-color">
                        <label class="palleon-control-label">Background</label>
                        <div class="palleon-control">
                            <input id="custom-background" type="text" class="palleon-colorpicker allow-empty preference" autocomplete="off" value="" />
                        </div>
                    </div>
                    <div class="palleon-control-wrap control-text-color">
                            <label class="palleon-control-label">Ruler Guide Color</label>
                            <div class="palleon-control">
                                <input id="ruler-guide-color" type="text" class="palleon-colorpicker allow-empty preference" autocomplete="off" value="#6658ea" />
                            </div>
                        </div>
                        <div class="palleon-control-wrap label-block">
                            <label class="palleon-control-label slider-label">Ruler Guide Size<span>1</span></label>
                            <div class="palleon-control">
                                <input id="ruler-guide-size" type="range" min="1" max="10" value="1" step="1" class="palleon-slider preference" autocomplete="off">
                            </div>
                        </div>
                </div>
                <div class="palleon-control-wrap label-block">
                    <div class="palleon-control">
                        <button id="palleon-preferences-save" type="button" class="palleon-btn palleon-lg-btn btn-full primary">Save Preferences</button>
                    </div>
                </div>
            </div>
            <!-- Settings END -->
        </div>
    </div>
    <!-- Toggle Left -->
    <div id="palleon-toggle-left"><span class="material-icons">chevron_left</span></div>
    <!-- Icon Panel END -->
    <!-- Body START -->
    <div id="palleon-body">
        <div class="palleon-wrap">
            <div id="palleon-ruler" class="palleon-inner-wrap">
                <!-- Ruler -->
                <div id="palleon-ruler-icon" class="closed" title="Ruler Menu"></div>
                <!-- Canvas Content START -->
                <div id="palleon-content" class="">
                    <!-- Canvas Image -->
                    <div id="palleon-canvas-img-wrap">
                        <img id="palleon-canvas-img" src="" data-filename="" data-template="<?= $file_url ?>" />
                        <!-- 
                            Don't remove img element! To open the editor with a default image, you can update it like the following; 
                            <img id="palleon-canvas-img" src="assets/placeholder-big.jpg" data-filename="placeholder" data-template="" />
                            To open the editor with a default template, you can update it like the following; 
                            <img id="palleon-canvas-img" src="" data-filename="template" data-template="files/templates/json/25.json" /> 
                        -->
                    </div>
                    <div id="palleon-canvas-wrap">
                        <!-- Canvas Loader -->
                        <div id="palleon-canvas-overlay"></div>
                        <div id="palleon-canvas-loader">
                            <div class="palleon-loader"></div>
                        </div>
                        <!-- Canvas - Don't remove canvas element! -->
                        <canvas id="palleon-canvas"></canvas>
                    </div>
                    <!-- Zoom & Pan Buttons -->
                    <div class="palleon-content-bar">
                        <div class="palleon-img-size"><span id="palleon-img-width">0</span>px<span class="material-icons">clear</span><span id="palleon-img-height">0</span>px</div>
                        <button id="palleon-img-drag" class="palleon-btn"><span class="material-icons">pan_tool</span></button>
                        <div id="palleon-img-zoom-counter" class="palleon-counter">
                            <button id="palleon-img-zoom-out" class="counter-minus palleon-btn"><span class="material-icons">remove</span></button>
                            <input id="palleon-img-zoom" class="palleon-form-field numeric-field" type="text" value="100" autocomplete="off" data-min="10" data-max="200" data-step="5">
                            <button id="palleon-img-zoom-in" class="counter-plus palleon-btn"><span class="material-icons">add</span></button>
                        </div>
                    </div>
                </div>
                <!-- Canvas Content END -->
            </div>
        </div>
    </div>
    <!-- Body END -->
    <!-- Toggle Right Button -->
    <div id="palleon-toggle-right"><span class="material-icons">chevron_right</span></div>
    <!-- Right Column START -->
    <div id="palleon-right-col">
        <h6 class="palleon-layers-title"><span class="material-icons">layers</span>Layers</h6>
        <div id="palleon-no-layer">
            No layers found. You can add text, element, image etc. to the canvas to create a layer. <a href="#" class="palleon-toggle-right">Close Panel</a>
        </div>
        <!-- Layer list - Don't remove it! -->
        <ul id="palleon-layers"></ul>
        <!-- Bulk delete layers -->
        <div id="palleon-layer-delete-wrap">
            <select id="palleon-layer-select" class="palleon-select" autocomplete="off">
                <option value="all" selected>All Layers</option>
                <option value="textbox">Texts</option>
                <option value="image">Images</option>
                <option value="frame">Frames</option>
                <option value="element">Elements</option>
                <option value="circle">Circles</option>
                <option value="ellipse">Ellipses</option>
                <option value="square">Squares</option>
                <option value="rectangle">Rectangles</option>
                <option value="triangle">Triangles</option>
                <option value="trapezoid">Trapezoids</option>
                <option value="pentagon">Pentagons</option>
                <option value="octagon">Octagons</option>
                <option value="emerald">Emeralds</option>
                <option value="star">Stars</option>
            </select>
            <button id="palleon-layer-delete" class="palleon-btn primary"><span class="material-icons">delete</span></button>
        </div>
    </div>
    <!-- Right Column END -->
    <!-- Modal Add New START -->
    <div id="modal-add-new" class="palleon-modal">
        <div class="palleon-modal-close" data-target="#modal-add-new"><span class="material-icons">close</span></div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner large">
                <div class="palleon-tabs">
                    <!-- Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#modal-select-img"><span class="material-icons">file_upload</span>New Image</li>
                        <li data-target="#modal-template-library"><span class="material-icons">photo_library</span>Template Library</li>
                        <li data-target="#modal-blank-canvas"><span class="material-icons">crop_original</span>Blank Canvas</li>
                    </ul>
                    <!-- New Image -->
                    <div id="modal-select-img" class="palleon-tab active">
                        <div class="palleon-select-btn-block">
                            <div>
                                <div class="palleon-btn-set">
                                    <div class="palleon-file-field">
                                        <input type="file" name="palleon-image-upload" id="palleon-image-upload" class="palleon-hidden-file" accept="image/png, image/jpeg, image/webp" />
                                        <label for="palleon-image-upload" class="palleon-btn primary palleon-lg-btn"><span class="material-icons">upload</span><span>Upload Image</span></label>
                                    </div>
                                    <button id="palleon-media-library" type="button" class="palleon-btn primary palleon-lg-btn palleon-modal-open" data-target="#modal-media-library"><span class="material-icons">photo_library</span>Select From Media Library
                                    </button>
                                </div>
                                <div class="palleon-keep">
                                    <label class="palleon-checkbox">
                                        <input id="keep-data" type="checkbox" autocomplete="off">
                                        <span class="palleon-checkmark"></span>
                                    </label>
                                    <div>Keep current objects and filters</div>
                                </div>
                            </div>
                            <div>
                                <div class="palleon-file-field">
                                    <input type="file" name="palleon-json-upload" id="palleon-json-upload" class="palleon-hidden-file" accept=".json,application/JSON" />
                                    <label for="palleon-json-upload" class="palleon-btn primary palleon-lg-btn"><span class="material-icons">upload</span><span>Upload Template</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Template Library -->
                    <div id="modal-template-library" class="palleon-tab">
                        <div class="palleon-templates-wrap">
                            <div class="palleon-tabs">
                                <ul class="palleon-tabs-menu">
                                    <li class="active" data-target="#palleon-all-templates">All</li>
                                    <li data-target="#palleon-templates-favorites">My Favorites</li>
                                    <li data-target="#palleon-mytemplates">My Templates</li>
                                </ul>
                                <!-- All Templates -->
                                <div id="palleon-all-templates" class="palleon-tab active">
                                    <div class="palleon-templates-menu-wrap">
                                        <input id="palleon-template-search-keyword" type="search" class="palleon-form-field" placeholder="Search by keyword..." autocomplete="off" />
                                        <select id="palleon-templates-menu" class="palleon-select palleon-select2" autocomplete="off">
                                            <option value="all" selected>All Categories (44)</option>
                                            <option value="blog-banners">Blog Banners (8)</option>
                                            <option value="banner-ads">Banner Ads (15)</option>
                                            <option value="collage">Collage (7)</option>
                                            <option value="quote">Quote (5)</option>
                                            <option value="medium-rectangle">Medium Rectangle Ads (2)</option>
                                            <option value="leaderboard">Leaderboard Ads (4)</option>
                                            <option value="billboard">Billboard Ads (2)</option>
                                            <option value="facebook-ads">Facebook Ads (3)</option>
                                            <option value="instagram-post">Instagram Post (5)</option>
                                            <option value="facebook-post">Facebook Post (4)</option>
                                            <option value="twitter-post">Twitter Post (3)</option>
                                            <option value="youtube-thumbnail">Youtube Thumbnail (2)</option>
                                        </select>
                                        <button id="palleon-template-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                                    </div>
                                    <div class="palleon-templates-content">
                                        <div class="palleon-grid-wrap">
                                            <div id="palleon-all-templates-noimg" class="notice notice-warning d-none">Nothing found.</div>
                                            <div id="palleon-templates-grid" class="palleon-grid template-grid template-selection paginated" data-perpage="21">
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/25.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/25.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Blog Banner - 2240x1260px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Modern Collage - 2 Photos - 2000x1300px" data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/20.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/20.jpg" title="Modern Collage - 2 Photos - 2000x1300px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc"> Modern Collage - 2 Photos - 2000x1300px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Youtube Video Thumbnail - 1280x720px" data-category="youtube-thumbnail">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/15.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/15.jpg" title="Youtube Video Thumbnail - 1280x720px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Youtube Video Thumbnail - 1280x720px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Black Friday Banner - Leaderboard - 728x90px" data-category="leaderboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/23.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/23.jpg" title="Black Friday Banner - Leaderboard - 728x90px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Black Friday Banner - Leaderboard - 728x90px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Trending Music Video - Youtube Thumbnail - 1280x720px" data-category="youtube-thumbnail">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/14.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/14.jpg" title="Trending Music Video - Youtube Thumbnail - 1280x720px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Trending Music Video - Youtube Thumbnail - 1280x720px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Kids Style Collage - 2 Photos - 2000x2000px" data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/18.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/18.jpg" title="Kids Style Collage - 2 Photos - 2000x2000px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Kids Style Collage - 2 Photos - 2000x2000px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Cafe Banner - Billboard - 970x250px" data-category="billboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/28.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/28.jpg" title="Cafe Banner - Billboard - 970x250px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Cafe Banner - Billboard - 970x250px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Beauty - Leaderboard - 728x90px" data-category="leaderboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/36.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/36.jpg" title="Beauty - Leaderboard - 728x90px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Beauty - Leaderboard - 728x90px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Digital Agency Banner - Leaderboard - 728x90px" data-category="leaderboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/8.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/8.jpg" title="Digital Agency Banner - Leaderboard - 728x90px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Digital Agency Banner - Leaderboard - 728x90px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Happy Birthday - Facebook Post - 940x788px" data-category="facebook-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/29.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/29.jpg" title="Happy Birthday - Facebook Post - 940x788px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Happy Birthday - Facebook Post - 940x788px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/27.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/27.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Blog Banner - 2240x1260px</div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Collage - 3 Photos - 2000x2000px" data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/16.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/16.jpg" title="Collage - 3 Photos - 2000x2000px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Collage - 3 Photos - 2000x2000px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Banner - Twitter Post - 1600x900px" data-category="twitter-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/39.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/39.jpg" title="Banner - Twitter Post - 1600x900px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">Banner - Twitter Post - 1600x900px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Christmas Sale - Instagram Post - Square - 1080x1080px" data-category="instagram-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/12.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/12.jpg" title="Christmas Sale - Instagram Post - Square - 1080x1080px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Christmas Sale - Instagram Post - Square - 1080x1080px
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Quote - Instagram Post - 1080x1080px" data-category="instagram-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/32.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/32.jpg" title="Quote - Instagram Post - 1080x1080px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Quote - Instagram Post - 1080x1080px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Modern Collage - 3 Photos - 2000x2000px" data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/22.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/22.jpg" title="Modern Collage - 3 Photos - 2000x2000px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Modern Collage - 3 Photos - 2000x2000px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Quote - 900x600px" data-category="quote">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/4.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/4.jpg" title="Quote - 900x600px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Quote - 900x600px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/26.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/26.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Blog Banner - 2240x1260px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Sale Banner - Instagram Post - Discount Offer - Square - 1080x1080px " data-category="instagram-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/1.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/1.jpg" title="Sale Banner - Instagram Post - Discount Offer - Square - 1080x1080px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Sale Banner - Instagram Post - Discount Offer - Square - 1080x1080px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Summer Sale - Facebook Ad - 1200x628px " data-category="facebook-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/10.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/10.jpg" title="Summer Sale - Facebook Ad - 1200x628px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Summer Sale - Facebook Ad - 1200x628px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Kids Style Collage - 2 Photos - 2000x1300px " data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/17.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/17.jpg" title="Kids Style Collage - 2 Photos - 2000x1300px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Kids Style Collage - 2 Photos - 2000x1300px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Happy Childrens Day - Facebook Post - 940x788px" data-category="facebook-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/33.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/33.jpg" title="Happy Childrens Day - Facebook Post - 940x788px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Happy Childrens Day - Facebook Post - 940x788px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Fitness Banner - Medium Rectangle - 300x250px " data-category="banner-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/6.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/6.jpg" title="Fitness Banner - Medium Rectangle - 300x250px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Fitness Banner - Medium Rectangle - 300x250px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Quote - Twitter Post - 1600x900px " data-category="quote">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/37.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/37.jpg" title="Quote - Twitter Post - 1600x900px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Quote - Twitter Post - 1600x900px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Real Estate - Facebook Post - 940x788px " data-category="facebook-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/41.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/41.jpg" title="Real Estate - Facebook Post - 940x788px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Real Estate - Facebook Post - 940x788px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Sale Banner - Facebook Ad - 1200x628px " data-category="facebook-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/11.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/11.jpg" title="Sale Banner - Facebook Ad - 1200x628px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Sale Banner - Facebook Ad - 1200x628px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Collage - 5 Photos - 2000x1000px" data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/21.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/21.jpg" title="Collage - 5 Photos - 2000x1000px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Collage - 5 Photos - 2000x1000px </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Fitness Banner - Medium Rectangle - 300x250px" data-category="banner-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/7.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/7.jpg" title="Fitness Banner - Medium Rectangle - 300x250px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Fitness Banner - Medium Rectangle - 300x250px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Quote - 800x600px" data-category="quote">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/3.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/3.jpg" title="Quote - 800x600px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Quote - 800x600px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Business Banner - Instagram Post - 1080x1080px" data-category="instagram-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/42.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/42.jpg" title="Business Banner - Instagram Post - 1080x1080px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Business Banner - Instagram Post - 1080x1080px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Business Facebook Post - 940x788px " data-category="facebook-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/13.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/13.jpg" title="Business Facebook Post - 940x788px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Business Facebook Post - 940x788px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="App Banner - 2000x1300px" data-category="banner-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/5.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/5.jpg" title="App Banner - 2000x1300px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            App Banner - 2000x1300px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Business Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/34.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/34.jpg" title="Business Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Business Blog Banner - 2240x1260px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Valentines Day - Instagram Post - Square - 1080x1080px" data-category="instagram-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/2.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/2.jpg" title="Valentines Day - Instagram Post - Square - 1080x1080px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Valentines Day - Instagram Post - Square - 1080x1080px
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/30.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/30.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Blog Banner - 2240x1260px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Stylish Collage - 3 Photos - 2000x2000px " data-category="collage">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/19.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/19.jpg" title="Stylish Collage - 3 Photos - 2000x2000px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Stylish Collage - 3 Photos - 2000x2000px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Pet Shop Banner - Billboard - 970x250px" data-category="billboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/9.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/9.jpg" title="Pet Shop Banner - Billboard - 970x250px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Pet Shop Banner - Billboard - 970x250px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/35.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/35.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Blog Banner - 2240x1260px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Christmas Banner - Leaderboard - 728x90px " data-category="leaderboard">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/24.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/24.jpg" title="Christmas Banner - Leaderboard - 728x90px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Christmas Banner - Leaderboard - 728x90px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/38.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/38.jpg" title="Blog Banner - 2240x1260px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Blog Banner - 2240x1260px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Fashion Banner - Facebook Ad - 1200x628px " data-category="facebook-ads">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/40.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/40.jpg" title="Fashion Banner - Facebook Ad - 1200x628px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Fashion Banner - Facebook Ad - 1200x628px 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid-item" data-keyword="Quote - Twitter Post - 1600x900px " data-category="twitter-post">
                                                    <div class="template-favorite">
                                                        <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star_border</span></button>
                                                    </div>
                                                    <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/31.json">
                                                        <div class="palleon-img-wrap">
                                                            <div class="palleon-img-loader"></div>
                                                            <img class="lazy" data-src="files/templates/img/31.jpg" title="Quote - Twitter Post - 1600x900px" />
                                                        </div>
                                                        <div class="palleon-masonry-item-desc">
                                                            Quote - Twitter Post - 1600x900px 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- My Favorites -->
                                <div id="palleon-templates-favorites" class="palleon-tab">
                                    <div class="palleon-grid template-grid template-selection paginated" data-perpage="21">
                                        <div class="grid-item" data-keyword="Blog Banner - 2240x1260px" data-category="blog-banners">
                                            <div class="template-favorite">
                                                <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star</span></button>
                                            </div>
                                            <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/25.json">
                                                <div class="palleon-img-wrap">
                                                    <div class="palleon-img-loader"></div>
                                                    <img class="lazy" data-src="files/templates/img/25.jpg" title="Blog Banner - 2240x1260px" />
                                                </div>
                                                <div class="palleon-masonry-item-desc">Blog Banner - 2240x1260px</div>
                                            </div>
                                        </div>
                                        <div class="grid-item" data-keyword="Modern Collage - 2 Photos - 2000x1300px" data-category="collage">
                                            <div class="template-favorite">
                                                <button type="button" class="palleon-btn-simple star" data-templateid=""><span class="material-icons">star</span></button>
                                            </div>
                                            <div class="palleon-masonry-item-inner palleon-select-template" data-json="files/templates/json/20.json">
                                                <div class="palleon-img-wrap">
                                                    <div class="palleon-img-loader"></div>
                                                    <img class="lazy" data-src="files/templates/img/20.jpg" title="Modern Collage - 2 Photos - 2000x1300px" />
                                                </div>
                                                <div class="palleon-masonry-item-desc"> Modern Collage - 2 Photos - 2000x1300px</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- My Templates -->
                                <div id="palleon-mytemplates" class="palleon-tab">
                                    <div id="palleon-my-templates-menu">
                                        <div></div>
                                        <div class="palleon-search-box">
                                            <input type="search" class="palleon-form-field" placeholder="Search by title..." autocomplete="off" />
                                            <button id="palleon-my-templates-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                                        </div>
                                    </div>
                                    <ul id="palleon-my-templates" class="palleon-template-list template-selection paginated" data-perpage="10">
                                        <li data-keyword="my template 1">
                                            <div>My Template 1</div>
                                            <div>
                                                <button type="button" class="palleon-btn primary palleon-select-template" data-json="files/templates/json/1.json"><span class="material-icons">check</span>Select</button>
                                                <button type="button" class="palleon-btn danger palleon-template-delete" data-target="files/templates/json/1.json"><span class="material-icons">clear</span>Delete</button>
                                            </div>
                                        </li>
                                        <li data-keyword="my template 2">
                                            <div>My Template 2</div>
                                            <div>
                                                <button type="button" class="palleon-btn primary palleon-select-template" data-json="files/templates/json/2.json"><span class="material-icons">check</span>Select</button>
                                                <button type="button" class="palleon-btn danger palleon-template-delete" data-target="files/templates/json/1.json"><span class="material-icons">clear</span>Delete</button>
                                            </div>
                                        </li>
                                    </ul>
                                    <div id="palleon-my-templates-noimg" class="notice notice-warning d-none">Nothing found.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blank Canvas -->
                    <div id="modal-blank-canvas" class="palleon-tab">
                        <div class="palleon-control-group">
                            <div>
                                <label>Size</label>
                                <select id="palleon-canvas-size-select" class="palleon-select" autocomplete="off">
                                    <option selected value="custom" data-width="800" data-height="800">Custom</option>
                                    <option value="" data-width="2240" data-height="1260">Blog Banner</option>
                                    <option value="" data-width="851" data-height="315">Facebook Cover</option>
                                    <option value="" data-width="1200" data-height="628">Facebook Ad</option>
                                    <option value="" data-width="1080" data-height="1080">Instagram Post</option>
                                    <option value="" data-width="750" data-height="1120">Pinterest Post</option>
                                    <option value="" data-width="940" data-height="788">Facebook Post</option>
                                    <option value="" data-width="1600" data-height="900">Twitter Post</option>
                                    <option value="" data-width="1280" data-height="720">Youtube Thumbnail</option>
                                    <option value="" data-width="1920" data-height="1080">Wallpaper</option>
                                </select>
                            </div>
                            <div>
                                <label>Width</label>
                                <input id="palleon-canvas-width" class="palleon-form-field" type="number" value="800" data-min="1" data-max="10000" autocomplete="off">
                            </div>
                            <div>
                                <label>Height</label>
                                <input id="palleon-canvas-height" class="palleon-form-field" type="number" value="800" data-min="1" data-max="10000" autocomplete="off">
                            </div>
                            <div>
                                <label>Background</label>
                                <input id="palleon-canvas-color" type="text" class="palleon-colorpicker allow-empty" autocomplete="off" value="" />
                            </div>
                            <div>
                                <button id="palleon-canvas-create" type="button" class="palleon-btn primary"><span class="material-icons">done</span>Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add New END -->
    <!-- Modal Save START -->
    <div id="modal-save" class="palleon-modal">
        <div class="palleon-modal-close" data-target="#modal-save"><span class="material-icons">close</span></div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner">
                <div class="palleon-tabs">
                    <!-- Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#modal-tab-save"><span class="material-icons">save</span>Save
                        </li>
                        <li data-target="#modal-tab-download"><span class="material-icons">download</span>Download</li>
                    </ul>
                    <!-- Save File -->
                    <div id="modal-tab-save" class="palleon-tab active">
                        <div id="palleon-save-as-img">
                            <div class="palleon-block-50">
                                <div>
                                    <label>File Name</label>
                                    <input id="palleon-save-img-name" class="palleon-form-field palleon-file-name" type="text" value="" autocomplete="off" data-default="">
                                </div>
                                <button id="palleon-save-img" type="button" class="palleon-btn primary"><span class="material-icons">save</span>Save As Image</button>
                            </div>
                            <div class="palleon-block-33">
                                <div>
                                    <label>DPI</label>
                                    <select id="palleon-save-img-dpi" class="palleon-select" autocomplete="off">
                                        <option selected value="72">72 DPI - Monitor Resolution</option>
                                        <option value="96">96 DPI</option>
                                        <option value="144">144 DPI</option>
                                        <option value="300">300 DPI - Printer Resolution</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Image Quality</label>
                                    <select id="palleon-save-img-quality" class="palleon-select" autocomplete="off">
                                        <option selected value="1">100%</option>
                                        <option value="0.9">90%</option>
                                        <option value="0.8">80%</option>
                                        <option value="0.7">70%</option>
                                        <option value="0.6">60%</option>
                                        <option value="0.5">50%</option>
                                        <option value="0.4">40%</option>
                                        <option value="0.3">30%</option>
                                        <option value="0.2">20%</option>
                                        <option value="0.1">10%</option>
                                    </select>
                                </div>
                                <div>
                                    <label>File Format</label>
                                    <select id="palleon-save-img-format" class="palleon-select" autocomplete="off">
                                        <option selected value="jpeg">JPEG</option>
                                        <option value="png">PNG</option>
                                        <option value="svg">SVG</option>
                                        <option value="webp">WEBP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-save-as-json">
                            <div class="palleon-block-50">
                                <div>
                                    <label>File Name</label>
                                    <input id="palleon-json-save-name" class="palleon-form-field palleon-file-name" type="text" value=" <?php echo $template_name; ?>" autocomplete="off" data-default="">
                                </div>
                                <button id="palleon-json-save" type="button" class="palleon-btn primary"><span class="material-icons">save</span>Save As Template</button>
                            </div>
                        </div>
                    </div>
                    <!-- Download File -->
                    <div id="modal-tab-download" class="palleon-tab ">
                        <div id="palleon-download-as-img">
                            <div class="palleon-block-50">
                                <div>
                                    <label>File Name</label>
                                    <input id="palleon-download-name" class="palleon-form-field palleon-file-name" type="text" value="" autocomplete="off" data-default="">
                                </div>
                                <button id="palleon-download" type="button" class="palleon-btn primary"><span class="material-icons">download</span>Download As Image</button>
                            </div>
                            <div class="palleon-block-33">
                                <div>
                                    <label>DPI</label>
                                    <select id="palleon-download-img-dpi" class="palleon-select" autocomplete="off">
                                        <option selected value="72">72 DPI - Monitor Resolution</option>
                                        <option value="96">96 DPI</option>
                                        <option value="144">144 DPI</option>
                                        <option value="300">300 DPI - Printer Resolution</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Image Quality</label>
                                    <select id="palleon-download-quality" class="palleon-select" autocomplete="off">
                                        <option selected value="1">100%</option>
                                        <option value="0.9">90%</option>
                                        <option value="0.8">80%</option>
                                        <option value="0.7">70%</option>
                                        <option value="0.6">60%</option>
                                        <option value="0.5">50%</option>
                                        <option value="0.4">40%</option>
                                        <option value="0.3">30%</option>
                                        <option value="0.2">20%</option>
                                        <option value="0.1">10%</option>
                                    </select>
                                </div>
                                <div>
                                    <label>File Format</label>
                                    <select id="palleon-download-format" class="palleon-select" autocomplete="off">
                                        <option selected value="jpeg">JPEG</option>
                                        <option value="png">PNG</option>
                                        <option value="svg">SVG</option>
                                        <option value="webp">WEBP</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-download-as-json">
                            <div class="palleon-block-50">
                                <div>
                                    <label>File Name</label>
                                    <input id="palleon-json-download-name" class="palleon-form-field palleon-file-name" type="text" value="" autocomplete="off" data-default="">
                                </div>
                                <button id="palleon-json-download" type="button" class="palleon-btn primary"><span class="material-icons">download</span>Download As Template</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Save END -->
    <!-- Modal Media Library START -->
    <div id="modal-media-library" class="palleon-modal">
        <div class="palleon-modal-close" data-target="#modal-media-library"><span class="material-icons">close</span>
        </div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner">
                <div class="palleon-tabs">
                    <!-- Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#library-my-images"><span class="material-icons">photo_library</span>My Images</li>
                        <li data-target="#library-all-images"><span class="material-icons">photo_library</span>Other Images
                        </li>
                    </ul>
                    <!-- My Images -->
                    <div id="library-my-images" class="palleon-tab active">
                        <div id="palleon-library-my-menu">
                            <div>
                                <form class="uploadImgToLibrary" enctype="multipart/form-data">
                                    <div class="palleon-file-field">
                                        <input type="file" name="palleon-library-upload-img" id="palleon-library-upload-img" class="palleon-hidden-file" accept="image/png, image/jpeg, image/webp" />
                                        <label for="palleon-library-upload-img" class="palleon-btn primary"><span class="material-icons">upload</span><span>Upload Image</span></label>
                                    </div>
                                </form>
                            </div>
                            <div class="palleon-search-box">
                                <input type="search" class="palleon-form-field" placeholder="Search by title..." autocomplete="off" />
                                <button id="palleon-library-my-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                            </div>
                        </div>
                        <div id="palleon-library-my" class="palleon-grid media-library-grid paginated" data-perpage="18">
                            <div class="palleon-masonry-item" data-keyword="lorem kotem">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="assets/placeholder.jpg" data-full="assets/placeholder-big.jpg" data-filename="Lorem" title="Lorem ipsum dolor" />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Lorem ipsum dolor</div>
                                </div>
                            </div>
                            <div class="palleon-masonry-item" data-keyword="ipsum">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="assets/placeholder.jpg" data-full="assets/placeholder-big.jpg" data-filename="Lorem" title="Lorem ipsum dolor" />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Lorem ipsum dolor</div>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-library-my-noimg" class="notice notice-warning d-none">Nothing found.</div>
                    </div>
                    <!-- All Images -->
                    <div id="library-all-images" class="palleon-tab">
                        <div id="palleon-library-all-menu">
                            <div></div>
                            <div class="palleon-search-box">
                                <input type="search" class="palleon-form-field" placeholder="Search by title..." autocomplete="off" />
                                <button id="palleon-library-all-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                            </div>
                        </div>
                        <div id="palleon-library-all" class="palleon-grid media-library-grid paginated" data-perpage="18">
                            <div class="palleon-masonry-item" data-keyword="lorem">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="assets/placeholder.jpg" data-full="assets/placeholder-big.jpg" data-filename="Lorem" title="Lorem"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Lorem ipsum dolor</div>
                                </div>
                            </div>
                            <div class="palleon-masonry-item" data-keyword="ipsum">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="assets/placeholder.jpg" data-full="assets/placeholder-big.jpg" data-filename="Lorem" title="Lorem"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Lorem ipsum dolor</div>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-library-all-noimg" class="notice notice-warning d-none"><strong>Nothing found.</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Media Library END -->
    <!-- Modal SVG Library START -->
    <div id="modal-svg-library" class="palleon-modal">
        <div class="palleon-modal-close" data-target="#modal-svg-library"><span class="material-icons">close</span>
        </div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner">
                <div class="palleon-tabs">
                    <!-- Menu -->
                    <ul class="palleon-tabs-menu">
                        <li class="active" data-target="#svg-library-my-images"><span class="material-icons">photo_library</span>My SVGs</li>
                        <li data-target="#svg-library-all-images"><span class="material-icons">photo_library</span>Other SVGs
                        </li>
                    </ul>
                    <!-- My SVGs -->
                    <div id="svg-library-my-images" class="palleon-tab active">
                        <div id="palleon-svg-library-my-menu">
                            <div>
                                <form class="uploadSVGToLibrary" enctype="multipart/form-data">
                                    <div class="palleon-file-field">
                                        <input type="file" name="palleon-svg-library-upload-img" id="palleon-svg-library-upload-img" class="palleon-hidden-file" accept="image/svg+xml" />
                                        <label for="palleon-svg-library-upload-img" class="palleon-btn primary"><span class="material-icons">upload</span><span>Upload Image</span></label>
                                    </div>
                                </form>
                            </div>
                            <div class="palleon-search-box">
                                <input type="search" class="palleon-form-field" placeholder="Search by title..." autocomplete="off" />
                                <button id="palleon-svg-library-my-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                            </div>
                        </div>
                        <div id="palleon-svg-library-my" class="palleon-grid svg-library-grid paginated" data-perpage="18">
                            <div class="palleon-masonry-item" data-keyword="Abstract Shape">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="files/elements/abstract-shapes/1.svg" data-full="files/elements/abstract-shapes/1.svg" data-filename="abstract-shape" title="Abstract Shape"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Abstract Shape</div>
                                </div>
                            </div>
                            <div class="palleon-masonry-item" data-keyword="another shape">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="files/elements/abstract-shapes/2.svg" data-full="files/elements/abstract-shapes/2.svg" data-filename="another-shape" title="Another Shape"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Another Shape</div>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-svg-library-my-noimg" class="notice notice-warning d-none">Nothing found.</div>
                    </div>
                    <!-- All SVGs -->
                    <div id="svg-library-all-images" class="palleon-tab">
                        <div id="palleon-svg-library-all-menu">
                            <div></div>
                            <div class="palleon-search-box">
                                <input type="search" class="palleon-form-field" placeholder="Search by title..." autocomplete="off" />
                                <button id="palleon-svg-library-all-search" type="button" class="palleon-btn primary"><span class="material-icons">search</span></button>
                            </div>
                        </div>
                        <div id="palleon-svg-library-all" class="palleon-grid svg-library-grid paginated" data-perpage="18">
                            <div class="palleon-masonry-item" data-keyword="Abstract Shape">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="files/elements/abstract-shapes/1.svg" data-full="files/elements/abstract-shapes/1.svg" data-filename="abstract-shape" title="Abstract Shape"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Abstract Shape</div>
                                </div>
                            </div>
                            <div class="palleon-masonry-item" data-keyword="another shape">
                                <div class="palleon-library-delete" data-target=""><span class="material-icons">remove</span></div>
                                <div class="palleon-masonry-item-inner">
                                    <div class="palleon-img-wrap">
                                        <div class="palleon-img-loader"></div>
                                        <img class="lazy" data-src="files/elements/abstract-shapes/2.svg" data-full="files/elements/abstract-shapes/2.svg" data-filename="another-shape" title="Another Shape"
                                        />
                                    </div>
                                    <div class="palleon-masonry-item-desc">Another Shape</div>
                                </div>
                            </div>
                        </div>
                        <div id="palleon-svg-library-all-noimg" class="notice notice-warning d-none"><strong>Nothing found.</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal SVG Library END -->
    <!-- Modal History START -->
    <div id="modal-history" class="palleon-modal">
        <div class="palleon-modal-close" data-target="#modal-history"><span class="material-icons">close</span></div>
        <div class="palleon-modal-wrap">
            <div class="palleon-modal-inner">
                <div class="palleon-modal-bg">
                    <h3 class="palleon-history-title">History<button id="palleon-clear-history" type="button"
                            class="palleon-btn danger"><span class="material-icons">clear</span>Clear History</button>
                    </h3>
                    <!-- History List - Don't remove ul element -->
                    <ul id="palleon-history-list" class="palleon-template-list" data-max="50"></ul>
                    <p class="palleon-history-count">Showing your last <span id="palleon-history-count"></span> actions.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal History END -->
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/fabric.min.js"></script>
    <script src="js/plugins.min.js"></script>
    <script src="js/palleon.min.js"></script>
     <!-- Canvas Ruler -->
    <script type="text/javascript">
         if (document.body.clientWidth >= 1200) {
            var evt = new Event('palleon-ruler'),
            dragdrop = new Dragdrop(evt),
            rg  = new RulersGuides(evt, dragdrop, document.getElementById("palleon-ruler"));
        }
    </script>
    <script src="js/custom.js"></script>
    <!-- Translation Strings -->
    <script>
        /* <![CDATA[ */
        var palleonParams = {
            "textbox": "Enter Your Text Here",
            "object": "Object",
            "loading": "Loading...",
            "loadmore": "Load More",
            "saved": "Saved!",
            "imgsaved": "Image is saved.",
            "tempsaved": "Template is saved.",
            "freeDrawing": "Free drawing",
            "frame": "Frame",
            "image": "Image",
            "circle": "Circle",
            "square": "Square",
            "rectangle": "Rectangle",
            "triangle": "Triangle",
            "ellipse": "Ellipse",
            "trapezoid": "Trapezoid",
            "pentagon":"Pentagon",
            "octagon":"Octagon",
            "emerald": "Emerald",
            "star": "Star",
            "element": "Element",
            "customSvg": "Custom SVG",
            "success": "Success",
            "error": "Error",
            "delete": "Delete",
            "duplicate": "Duplicate",
            "showhide": "Show/Hide",
            "lockunlock": "Lock/Unlock",
            "text": "Text",
            "started": "Editing started.",
            "added": "added.",
            "removed": "removed.",
            "resized": "resized.",
            "edited": "edited.",
            "replaced": "replaced.",
            "rotated": "rotated.",
            "moved": "moved.",
            "scaled": "scaled.",
            "flipped": "flipped.",
            "cropped": "cropped.",
            "bg": "Canvas",
            "filter": "filter",
            "showRulers":"Show rulers",
            "hideRulers":"Hide rulers",
            "showGuides":"Show guides",
            "hideGuides":"Hide guides",
            "clearAllGuides":"Clear all guides",
            "question1":"Are you sure you want clear the history?",
            "question2":"Are you sure you want to delete the layers?",
            "question3":"Are you sure you want to crop the image?",
            "question4":"Are you sure you want to resize the image?",
            "noDuplicate":"You can not duplicate multiple objects. Please select single object to duplicate.",
            "warning": "Warning",
            "qrCode": "QR Code",
            "startDrawing": "Start Drawing",
            "stopDrawing": "Stop Drawing",
            "erased": "Pixels erased."
        };
        /* ]]> */
    </script>
    <!-- Scripts END -->
</body>
<!-- Body END -->

</html>