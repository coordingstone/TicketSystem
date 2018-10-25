<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/html">

<head>
    {block name=head}
        {include file="./header.tpl"}
    {/block}

</head>
<body>
    <div id="alert-message" style="display: none;">

    </div>

    <div id="container" class="container-fluid">
        {block name=menu}
            {include file="./menu.tpl"}
        {/block}
        {block name=mainContent}

        {/block}
    </div>
    {block name=footer}
        {include file="./footer.tpl"}
    {/block}
</body>
<script type="text/template" id="alert-message-template">
    <div id="alert-message">
        <div style="padding: 5px;">
            <div class="alert alert-<%=type%> alert-dismissible" role="alert">
                <strong><%= shortDesc %></strong>&nbsp;<%=text%>
            </div>
        </div>
    </div>
</script>
      {block name=afterBodyBlock}

      {/block}
</html>