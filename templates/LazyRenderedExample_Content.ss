<%--This template is interpreted as a layout--%>
<div id="assetadmin-cms-content" class="cms-content center $BaseCSSClasses" data-layout-type="border" data-pjax-fragment="Content">

	<% with $EditForm %>
        <div class="cms-content-header north">
            <div class="cms-content-header-info">
				<% with $Controller %>
					<%-- Includes the LazyRendered Breadcrumb Override --%>
					<% include CMSBreadcrumbs %>
				<% end_with %>
            </div>
        </div>

        <div class="cms-content-fields center ui-widget-content cms-panel-padded" data-layout-type="border">
			$Top.Tools

            <div class="cms-content-view">
				<%--LazyRendered handles your views through the $Body template tag below--%>
				<%-- Note: Scope must be at the top, or use $Top.Body--%>
				$Top.Body
            </div>
        </div>
	<% end_with %>

</div>
