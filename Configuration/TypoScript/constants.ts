
plugin.tx_relax5event_event {
    view {
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5event/Resources/Private/Templates/
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5event/Resources/Private/Partials/
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5event/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_relax5event_event//a; type=string; label=Default storage PID
        storagePid =
    }
}

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

plugin.tx_relax5event_event {
    view {
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:relax5core/Resources/Private/Templates/
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:relax5core/Resources/Private/Partials/
        # cat=plugin.tx_relax5event_event/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:relax5core/Resources/Private/Layouts/
    }
}
