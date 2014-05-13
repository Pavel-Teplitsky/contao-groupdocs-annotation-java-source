<?php

$groupdocs_url = $_POST['url'];
$width = $_POST['width'];
$height = $_POST['height'];
$path = base64_encode(trim(strip_tags($_POST['path'])));
if (!empty($groupdocs_url)) {
    if ($width == 0) {
        $width = "650";
    }
    if ($height == 0) {
        $height = "500";
    }
    if (substr($groupdocs_url, -1) == '/') {
        $groupdocs_url = substr_replace($groupdocs_url, "", -1);
    }
    $url = $groupdocs_url . "/GetJsHandler?script=libs/jquery-1.9.1.min.js";
    $headers = get_headers($url, 1);
    if ($headers[0] == 'HTTP/1.1 200 OK') {
        $content = '';
        // standard embedding
        $script = '<div id="GD_Annotation_Java">GroupDocs Annotation for Java<script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/jquery-1.9.1.min.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/jquery-ui-1.10.3.min.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/knockout-3.0.0.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/turn.min.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/modernizr.2.6.2.Transform2d.min.js"></script>
                <script type="text/javascript">
                    if (!window.Modernizr.csstransforms)
                        $.ajax({
                            url: "' . $groupdocs_url . '/GetJsHandler?script=libs/turn.html4.min.js",
                            dataType: "script",
                            type: "GET",
                            async: false
                        });
                </script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=installableViewer.min.js"></script>
                <script type="text/javascript">
                    $.ui.groupdocsViewer.prototype.applicationPath = "' . $groupdocs_url . '/";
                </script>
                <script type="text/javascript">
                    $.ui.groupdocsViewer.prototype.useHttpHandlers = true;
                </script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=GroupdocsViewer.all.min.js"></script>
                <div style="display:none">// <![CDATA[
                <p>                           
                <link rel="stylesheet" type="text/css" href="' . $groupdocs_url . '/GetCssHandler?script=bootstrap.css"/>
                <link rel="stylesheet" type="text/css" href="' . $groupdocs_url . '/GetCssHandler?script=GroupdocsViewer.all.min.css"/>
                <link rel="stylesheet" type="text/css" href="' . $groupdocs_url . '/GetCssHandler?script=jquery-ui-1.10.3.dialog.min.css"/>
                // ]]></div>                                   
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/jquery.tinyscrollbar.min.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=GroupdocsAnnotation.all.min.js"></script>
                <div style="display:none">// <![CDATA[
                <p>                              
                <link rel="stylesheet" type="text/css" href="' . $groupdocs_url . '/GetCssHandler?script=Annotation.css"/>
                <link rel="stylesheet" type="text/css" href="' . $groupdocs_url . '/GetCssHandler?script=Toolbox.css"/>
                // ]]></div>                              
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=libs/atmosphere-min.js"></script>
                <script type="text/javascript" src="' . $groupdocs_url . '/GetJsHandler?script=GroupDocsAtmosphere.js"></script>
                        <div id="annotation-widget" style="width:' . $width . 'px;height:' . $height . 'px;overflow:hidden;position:relative;margin-bottom:20px;background-color:gray;border:1px solid #ccc;"></div>
                        <script type="text/javascript">
                    $(function () {
                        var annotationWidget = $("#annotation-widget").groupdocsAnnotation({
                            width: ' . $width . ',
                            height: ' . $height . ',
                            fileId: "' . $path . '",
                            docViewerId: "annotation-widget-doc-viewer",
                            quality: 90,
                            enableRightClickMenu: true,
                            showHeader: true,
                            showZoom: true,
                            showPaging: true,
                            showPrint: false,
                            showFileExplorer: true,
                            showThumbnails: false,
                            openThumbnails: false,
                            zoomToFitWidth: false,
                            zoomToFitHeight: false,
                            initialZoom: 100,
                            preloadPagesCount: 0,
                            enableSidePanel: true,
                            strikeOutColor: "",
                            enabledTools: 127,
                            saveReplyOnFocusLoss: false,
                            sideboarContainerSelector: "div.comments_sidebar_wrapper",
                            usePageNumberInUrlHash: false,
                            textSelectionSynchronousCalculation: true,
                            variableHeightPageSupport: true,
                            useJavaScriptDocumentDescription: true,
                            isRightPanelEnabled: true,
                            createMarkup: true,
                            use_pdf: true,
                            _mode: "annotatedDocument",
                            selectionContainerSelector: "[name=\'selection-content\']",

                            graphicsContainerSelector: ".annotationsContainer",

                            userName: "Anonimous", userId: "975a5ecc-3487-4301-aecc-01dc03eaeb81"

                        });
                        var annotationsViewer = $(annotationWidget).groupdocsAnnotation("getViewer");
                        var annotationsViewerVM = $(annotationsViewer).groupdocsAnnotationViewer("getViewModel");


                        var commentModePanel = $(annotationWidget).find("div.embed_annotation_tools");
                        commentModePanel.css("margin-right", 0);

                        commentModePanel.draggable({
                            scroll: false,
                            handle: ".tools_dots",
                            containment: "body",
                            appendTo: "body"
                        });

                        $(annotationWidget).find(".tool_field").click(function () {
                            var toolFields = $(annotationWidget).find(".tool_field");
                            if (toolFields.hasClass("active")) {
                                $(toolFields.removeClass("active"));
                            }
                            ;
                            $(this).addClass("active");
                        });

                        $(annotationWidget).find(".header_tools_icon").hover(
                                function () {
                                    $(this).find(".tooltip_on_hover").css("display", "block");
                                },
                                function () {
                                    $(this).find(".tooltip_on_hover").css("display", "none");
                                });


                        if (annotationsViewerVM.enableSidePanel)
                            $("#annotation-widget .comments_togle_btn").click(function () {
                                flipPanels(true);
                            });

                        $(annotationWidget).find(".comments_scroll").tinyscrollbar({ sizethumb: 50 });
                        $(annotationWidget).find(".comments_scroll_2").tinyscrollbar({ sizethumb: 50 });

                        var annotationIconsWrapper = $(annotationWidget).find(".annotation_icons_wrapper");
                        var annotationIconsWrapperParent = annotationIconsWrapper.parent()[0];
                        var annotationIconsWrapperParentScrollTop;

                        annotationsViewer.bind("onDocumentLoadComplete", function (e, data) {
                            annotationsViewerVM.setHandToolMode();

                            annotationIconsWrapper.height($(annotationsViewer).find(".pages_container").height());
                            annotationIconsWrapperParent.scrollTop = annotationIconsWrapperParentScrollTop;

                            window.setTimeout(resizeSidebar, 10);
                        });

                        annotationsViewer.bind("onDocViewScrollPositionSet", function (e, data) {
                            annotationIconsWrapper.parent()[0].scrollTop = data.position;
                        }.bind(this));

                        annotationsViewer.bind("onBeforeScrollDocView onDocViewScrollPositionSet", function (e, data) {
                            if (annotationIconsWrapperParent.scrollTop != data.position) {
                                annotationIconsWrapperParent.scrollTop = data.position;
                                annotationIconsWrapperParentScrollTop = data.position;
                            }
                        }.bind(this));

                        function flipPanels(togglePanels) {
                            var docViewer = $(annotationsViewer)[0];
                            var annotationIconsPanelVisible = $(annotationWidget).find(".comments_sidebar_collapsed").is(":visible");

                            function setIconsPanelScrollTop() {
                                if (!annotationIconsPanelVisible)
                                    annotationIconsWrapperParent.scrollTop = docViewer.scrollTop;
                            }

                            function redrawLinesAndCalculateZoom() {
                                setIconsPanelScrollTop();

                                if (togglePanels)
                                    annotationsViewerVM.redrawConnectingLines(!annotationIconsPanelVisible);
                                else {
                                    annotationsViewerVM.resizePagesToWindowSize();
                                    var selectableElement = annotationsViewerVM.getSelectable();

                                    if (selectableElement != null) {
                                        var selectable = (selectableElement.data("ui-dvselectable") || selectableElement.data("dvselectable"));
                                        selectable.initStorage();
                                    }

                                    annotationsViewerVM.redrawWorkingArea();
                                }
                            }

                            if (togglePanels) {
                                if (!annotationIconsPanelVisible) {
                                    redrawLinesAndCalculateZoom();
                                }

                                var setIntervalId = window.setInterval(function () {
                                    setIconsPanelScrollTop();
                                }, 50);

                                $(annotationWidget).find(".comments_sidebar_collapsed").toggle("slide", { direction: "right" }, 400, function () {
                                    clearInterval(setIntervalId);
                                    setIconsPanelScrollTop();
                                });

                                $(annotationWidget).find(".comments_sidebar_expanded").toggle("slide", { direction: "right" }, 400,
                                        function () {
                                            if (annotationIconsPanelVisible)
                                                redrawLinesAndCalculateZoom();
                                            else
                                                setIconsPanelScrollTop();

                                            //window.setZoomWhenTogglePanel();
                                        });
                            }
                            else
                                redrawLinesAndCalculateZoom();

                            $(annotationWidget).find(".comments_scroll").tinyscrollbar_update("relative");
                            $(annotationWidget).find(".comments_scroll_2").tinyscrollbar_update("relative");
                        }

                        $(window).resize(function () {
                            flipPanels(false);
                            resizeSidebar();
                        });

                        resizeSidebar();


                        function resizeSidebar() {
                            var containerHeight = $("#annotation-widget .doc_viewer").height();
                            $(annotationWidget).find(".comments_content").css({ "height": (containerHeight - 152) + "px" });
                            $(annotationWidget).find(".comments_scroll").css({ "height": (containerHeight - 152) + "px" });
                            $(annotationWidget).find(".comments_scroll .viewport").css({ "height": (containerHeight - 172) + "px" });
                            $(annotationWidget).find(".comments_sidebar_collapsed").css({ "height": (containerHeight - 50) + "px" });
                            $(annotationWidget).find(".comments_scroll").tinyscrollbar_update("relative");
                            $(annotationWidget).find(".comments_scroll_2").css({ "height": (containerHeight - 152) + "px" });
                            $(annotationWidget).find(".comments_scroll_2 .viewport").css({ "height": (containerHeight - 152) + "px" });
                            $(annotationWidget).find(".comments_scroll_2").tinyscrollbar_update("relative");
                        }

                        $("html").click(function () {
                            if ($(annotationWidget).find(".dropdown_menu_button").hasClass("active")) {
                                $(annotationWidget).find(".dropdown_menu_button.active").next(".dropdown_menu").hide("blind", "fast");
                                $(annotationWidget).find(".dropdown_menu_button.active").removeClass("active");
                            }
                        });

                    });


                    window.jerror = function (msg, handler, title) {
                        var ttl = title || "Uh-oh, something went wrong!";

                        if (!msg) msg = "Sorry, we\'re unable to perform your request right now. Please try again later.";

                        $("#jerrormodal h3").text(ttl);
                        $("#jerrormodalText").text(msg.Reason ? msg.Reason : msg);

                        if (handler) {
                            $("#jerrormodal").one("hidden", handler);
                        }

                        $("#jerrormodal").modal("show");
                    }

                    $(function () {
                        if ($("#jerrormodal").length > 0)
                            return;

                        $("<div id=\'jerrormodal\' class=\'modal fade modal2\' style=\'z-index: 9999\'>" +
                                "  <div class=\'modal_inner_wrapper\'>" +
                                "      <a class=\'popclose\' data-dismiss=\'modal\'></a>" +
                                "      <div class=\'modal_header\'>" +
                                "          <h3>Uh-oh</h3>" +
                                "      </div>" +
                                "      <div class=\'modal_content\'>" +
                                "          <div class=\'modal_input_wrap_left\'>" +
                                "              <p id=\'jerrormodalText\' class=\'modaltext left\'>An unexpected error occured. Please conatct Support team for the assistance.</p>" +
                                "          </div>" +
                                "      </div>" +
                                "  </div>" +
                                "</div>").appendTo("body");

                        $("#jerrormodal").modal({ show: false });
                    });
                    </script></div>';
    } else {
        $content = "Looks like URL for GroupDocs.Annotation for Java is wrong, please check it in edit block form";
        $script = "<div id='annotationjava' style='width:" . $width . "px;height:" . $height . "px;overflow:hidden;position:relative;margin-bottom:20px;background-color:gray;border:1px solid #ccc;'>" . $content . "</div>";
    }
}
$result = array("result" => $script);
echo json_encode($result);
?>