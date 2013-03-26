#JS Readme 
###Touch events: 
Using HammerJS to handle touch events. 
https://github.com/EightMedia/hammer.js/wiki/Getting-Started 
Touch events are detected using the user agent string. If its mobile then the touch init fires which binds all of the events. 

###Modularization 
In an effort to make my code more modular and reuseable everything is namespaced inside of the APP object. Withing that, im breaking up each section into stuff that it is supposed to control. 
For insance, there is a controls object that just deals with buttons & controls. 
Each component is going to be responsoble for binding its own events, exposing and hiding any interface methods on its own ect.. 

The Events should be able to add publishers and then tell all of the publishers to bind all of their resitered events. 
So to add a publisher you would: 
````js 
this.events.addPublisher( 'controls' );
```` 

And to loop through the list of publishers and tell them to bind all of their events you would: 
````js 
this.events.bindAll( );
```` 
Publishers can register their own events like so: 
````js 
this.events.controls.addEvent( event, action )
```` 
The events should then be able to be fired and the arguments for the events obtained by the handlers using 
apply & the args variable.

