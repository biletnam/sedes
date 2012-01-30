(function(simply) {
    
    simply.field = Backbone.View.extend({
        
        labelText: null,
        modelField: null,
        label: null,
        id: null,
        tagName: 'input',
        tagType: 'text',
        form: null,
        fieldName: null,
        choices: [],
        required: false,
        valid: false,
        wrapper: null,
        
        initialize: function(options) {
            this.labelText = options.label;
            this.id = options.id;
            this.form = options.form;
            this.choices = options.choices;
            this.required = options.required;
            
            this.makeName();
            this.makeLabel();
            this.renderField();
            
            this.delegateEvents();
        },
        
        events: {
            'blur': 'validate' 
        },
        
        makeName: function() {
            this.fieldName = this.form.name + '_' + this.id;
        },
        
        makeLabel: function() {
            this.label = this.make('label', {"for": this.fieldName}, this.labelText);
        },
        
        render: function() {
            this.wrapper = $(this.make('div', { "id": this.fieldName + '_wrapper', "class": "fieldWrapper"}));
            
            this.wrapper.append(this.label);
            this.wrapper.append(this.el);
            
            return this.wrapper;
        },
        
        renderField: function() {
            this.el = $(this.make(this.tagName, { "type": this.tagType, "id" : this.fieldName, "name": this.fieldName}));
            return this.el;
        },
        
        validate: function() {
            console.log('Validating: ' + this.fieldName);
            this.valid = true;
            
            this.wrapper.removeClass('valid').removeClass('invalid');
            
            if(this.valid) {
                this.wrapper.addClass('valid');
            }else{
                this.wrapper.addClass('invalid');
            }
        }
    });
    
})(window.simply);