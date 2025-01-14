jQuery(function($) {
    var actions = [];

    // Iterate over tmtL10n, excluding the 'refreshText' key
    $.each(tmtL10n.actions, function(key, title) {
        actions.unshift({
            action: 'bulk_' + key,
            name: title,
            el: $('#tmt-input-' + key)
        });
    });

    // Add actions to the bulk actions dropdown
    $('.actions select').each(function() {
        var $option = $(this).find('option:first');

        $.each(actions, function(i, actionObj) {
            $option.after(
                $('<option>', {
                    value: $('<div>').text(actionObj.action).html(),
                    html: $('<div>').text(actionObj.name).html()
                })
            );
        });
    }).change(function() {
        var $select = $(this);

        $.each(actions, function(i, actionObj) {
            if ($select.val() === actionObj.action) {
                actionObj.el
                    .insertAfter($select)
                    .css('display', 'inline')
                    .find(':input').focus();
            } else {
                actionObj.el.css('display', 'none');
            }
        });
    });
});

jQuery(document).ready(function($) {
    // Add the refresh text to the page
    $('.alignleft.actions.bulkactions').after(
        '<span style="height:100%; display:inline-flex; align-items:center;" class="rfrsh-txt">' +
        tmtL10n.refreshText +
        '</span>'
    );
});
