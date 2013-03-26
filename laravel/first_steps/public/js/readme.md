#JS Readme 
###Touch events: 
Using HammerJS to handle touch events. 
https://github.com/EightMedia/hammer.js/wiki/Getting-Started 
Touch events are detected using the user agent string. If its mobile then the touch init fires which binds all of the events. 

###Modularization 
In an effort to make my code more modular and reuseable everything is namespaced inside of the APP object. Withing that, im breaking up each section into stuff that it is supposed to control. 
For insance, there is a controls object that just deals with buttons & controls. 
Each component is going to be responsoble for binding its own events, exposing and hiding any interface methods on its own ect.. 

Events should be able to bind all of the events for all of the players or each specifically. So 
````js 
this.events.addAll( )
```` 
or 

````js 
this.events.addEvent( 'controls' )
```` 
The events should then be able to be called and the arguments for the events passed to the handlers using 
apply.