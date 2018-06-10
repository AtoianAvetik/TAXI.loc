fwEvents.on('fw-builder:'+ 'form-builder' +':register-items', function(builder){
	var currentItemType = 'card-section';

	var localized = window['fw_form_builder_item_type_card_section'];

	var ItemView = builder.classes.ItemView.extend({
		template: _.template(
			'<div class="fw-form-builder-item-style-default fw-form-builder-item-type-'+ currentItemType +'">'+
				'<div class="fw-form-item-controls fw-row">'+
					'<div class="fw-form-item-controls-left fw-col-xs-7">'+
            			'<div class="column-title"><%= label %></div>' +
					'</div>'+
					'<div class="fw-form-item-controls-right fw-col-xs-5 fw-text-right">'+
						'<div class="fw-form-item-control-buttons">'+
							'<a class="fw-form-card-section-control-required dashicons<% if (required) { %> required<% } %>" data-hover-tip="<%- toggle_required %>" href="#" onclick="return false;" >*</a>'+
							'<a class="fw-form-card-section-control-edit dashicons dashicons-admin-generic" data-hover-tip="<%- edit %>" href="#" onclick="return false;" ></a>'+
							'<a class="fw-form-card-section-control-remove dashicons dashicons-no" data-hover-tip="<%- remove %>" href="#" onclick="return false;" ></a>'+
						'</div>'+
					'</div>'+
				'</div>'+
            	'<div class="builder-items"></div>' +
			'</div>'
		),
		events: {
			'click': 'onWrapperClick',
			'click .fw-form-card-section-control-edit': 'openEdit',
			'click .fw-form-card-section-control-remove': 'removeItem',
			'click .fw-form-card-section-control-required': 'toggleRequired'
		},
		initialize: function() {
			this.defaultInitialize();

			// prepare edit options modal
			{
				this.modal = new fw.OptionsModal({
					title: localized.l10n.item_title,
					options: this.model.modalOptions,
					values: this.model.get('options'),
					size: 'medium'
				});

				this.listenTo(this.modal, 'change:values', function(modal, values) {
					this.model.set('options', values);
				});

				this.model.on('change:options', function() {
					this.modal.set(
						'values',
						this.model.get('options')
					);
				}, this);
			}
		},
		render: function () {
			this.defaultRender({
				label: fw.opg('label', this.model.get('options')) || localized.l10n.item_title,
				required: fw.opg('required', this.model.get('options')),
				default_value: fw.opg('default_value', this.model.get('options')),
				placeholder: fw.opg('placeholder', this.model.get('options')),
				toggle_required: localized.l10n.toggle_required,
				edit: localized.l10n.edit,
				remove: localized.l10n.delete,
				edit_label: localized.l10n.edit_label
			});
		},
		openEdit: function() {
			this.modal.open();
		},
		removeItem: function() {
			this.remove();

			this.model.collection.remove(this.model);
		},
		toggleRequired: function() {
			var values = _.clone(
				// clone to not modify by reference, else model.set() will not trigger the 'change' event
				this.model.get('options')
			);

			values.required = !values.required;

			this.model.set('options', values);
		},
		onWrapperClick: function(e) {
            e.stopPropagation();

			if (!this.$el.parent().length) {
				// The element doesn't exist in DOM. This listener was executed after the item was deleted
				return;
			}

			if (!fw.elementEventHasListenerInContainer(jQuery(e.srcElement), 'click', this.$el)) {
				this.openEdit();
			}
		}
	});

	var Item = builder.classes.Item.extend({
		defaults: function() {
			var defaults = _.clone(localized.defaults);

			defaults.shortcode = fwFormBuilder.uniqueShortcode(defaults.type +'_');

			return defaults;
		},
		initialize: function() {
			this.defaultInitialize();

			/**
			 * get options from wp_localize_script() variable
			 */
			this.modalOptions = localized.options;

			this.view = new ItemView({
				id: 'fw-builder-item-'+ this.cid,
				model: this
			});
		},
        allowIncomingType: function (type) {
            return 'card-section' !== type;
        },
        allowDestinationType: function (type) {
            return 'column' !== type;
        }
	});

	builder.registerItemClass(Item);
});
