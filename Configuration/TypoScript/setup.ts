
plugin.tx_relax5event_event {
    view {
        templateRootPaths.0 = EXT:relax5event/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5event_event.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5event/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5event_event.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5event/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5event_event.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5event_event.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_relax5event._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-relax5event table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-relax5event table th {
        font-weight:bold;
    }

    .tx-relax5event table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

page.includeCSS {
   relax5eventCss = EXT:relax5event/Resources/Public/Styles/relax5event.css
}

page.includeJSFooter {
  relax5eventJs = EXT:relax5event/Resources/Public/Scripts/relax5event.js
  relax5eventJs.forceOnTop = 0
}