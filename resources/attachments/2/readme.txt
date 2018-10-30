u«Zµìmþ™ZŠvÚ±î¸u«Zµìmþ™ZŠvÚ±î¸______________________________________________________________________

 Lunar Magic : Super Mario World Level Editor
 October 1, 2009
 Version 1.65

 FuSoYa's Niche
 http://fusoya.eludevisibility.org (also http://fusoya.cjb.net)
______________________________________________________________________

 CONTENTS
______________________________________________________________________

 1. Credits
 2. Introduction
 3. What's New
 4. Legal Notice
 5. Contact Information

______________________________________________________________________

 1. Credits
______________________________________________________________________


 PROGRAMMING:           FuSoYa (Defender of Relm)

 DEVELOPMENT TOOLS:     ZSNES debugger, Jeremy Gordon's 65816
                        assembler (custom build), SNES Professional
                        ASM kit (SPASM),SNES9X tracer feature, Naga,
                        Tile Layer Pro, Borland's C++ IDE version 5.02

______________________________________________________________________

 2. Introduction
______________________________________________________________________

 Lunar Magic is a level editor for the American and Japanese version
 1.00 Super Mario World SNES ROMs, and the SMW portion of the
 American version 1.00 Mario All Stars + World SNES ROM.  It's a
 Windows 9x program with a fairly easy to use WYSIWYG interface that
 includes clipboard and drag/drop support, external level file saving
 and loading, graphics editing, palette editing, enemy support, world
 map editing, text editing, plus numerous 65816 ASM enhancements to
 expand the original game’s capabilities.  

 The project was first started in February of 2000, and was worked on
 and updated fairly often over several years.  Although the program
 took a substantial amount of time and effort to build, the result has
 been a rather powerful editor that should provide a fairly easy way
 for just about anyone to make their own customizations of this
 classic Mario game.

 Anyway, have fun making your own SMW levels!  ^^


______________________________________________________________________

 3. What's New
______________________________________________________________________

Version 1.65 October 1, 2009

-fixed "export multiple levels to mwl files" feature, where LM was
 trying to open the ROM twice when it shouldn't have.  This fails in
 1.64, due to certain file operations having been tightened up to
 detect this kind of thing in old code.
-fixed saving to mwl files, where if the level had ExAnimations it
 wouldn't save them correctly and would then disrupt the level's
 Super GFX bypass settings.  While this shows up in 1.64, the code
 was wrong in all 1.6x versions yet apparently still worked due to a
 strange coincidence.
-updated extended object 46 (midway point bar) to break up on screen
 boundaries like the game does.  Thanks goes out to TRS for noticing
 this.


Version 1.64 September 24, 2009 (9 year Anniversary of Lunar Magic!)

-fixed a memory leak with sprites that exists in all prior versions
 of LM
-fixed an issue where if you used entry 0x1F in the Extended
 Animation Frames list and saved to the ROM or a mwl file, LM would
 save the data but upon reopening the level it would not read anything
 from the list at all.  Thanks goes out to Jimmy52905 for discovering
 this.
-fixed a problem with mouse gestures where holding down the right
 mouse button inside the editor window and then left clicking outside
 it would cause LM to crash.  Thanks goes out to crushawake for
 finding this.
-adjusted a slope object in LM to emulate a game bug that causes the
 slope to break up on screen boundaries in some cases.  Thanks goes
 out to Alex99 for noticing this.
-fixed the "view screen exits" toolbar button so it doesn't stay
 pressed if you switch to view screen or sub-screen boundaries, as
 reported by Maxx.
-corrected tileset info for Thwomp and Thwimp, reported by Noobish
 Noobsicle.
-fixed the animation of the wave tile in the overworld editor so it
 moves in the correct direction.  Thanks goes out to Sukasa for
 finding this.
-fixed loading an unmodified title screen in the overworld editor
 when it's from an 8 MB ExLoROM game.
-fixed an issue in the overworld editor where if LM ever had to
 report an error while reloading the overworld and tile animation
 was turned on, LM would start spawning multiple message boxes. 
 Thanks goes out to Obsidian for reporting this.
-updated the overworld palette editor so that alt-right click does a
 gradient instead of ctrl-right click, as in the level palette
 editor.  Should have been done in version 1.63.
-fixed overworld exit tile 0x4D so it can connect directly to a
 level tile without malfunctioning, which the original game doesn't
 allow...  I think Nintendo originally set it up as a corner path
 tile and didn't completely convert it when they decided to use it as
 an exit tile.
-added a new method to the overworld editor for linking
 star/pipe/exit tiles together with fewer steps using alt-left click.
-added an option to the overworld editor that allows turning off level
 24's redirection of exits based on coins and time.
-added a setting to the overworld editor that can change the one level
 used to activate a secret exit when beating a boss, which was used by
 the Big Boo Boss.
-fixed sprite interaction with custom block ASM in vertical levels.  I
 actually fixed this years ago and temporarily released the fix as a
 patch, intending to later integrate it into LM for version 1.62.  But
 mysteriously the fix never made it into the program...  I suspect I
 was waiting till I had time to check/adjust the fix for the Japanese
 ROM as well, and forgot about it.
-implemented the "Mario touched top corner of block", "Mario within
 block (body)", and "Mario within block (head)" custom block ASM
 hooks.  Two of these were used in a few of DW:TLC's blocks.  Should
 of been done before, but likely wasn't for the same reason as the
 sprite fix.
-adjusted the 16x16 program icon for WinXP, since apparently XP has
 something against using 16 color icons at times.
-fixed mwl file association for Windows Vista, which should also fix
 it for non-administrator accounts on Win2k and up.
-file types mw0, mw1, mw2, and mw3 are no longer associated with
 Lunar Magic, as the program hasn't used those for saving levels
 since 2003.  Note that this does not affect LM's ability to open
 levels saved in the older format.
-added a feature that allows LM to add a copier header to the ROM for
 you if it's missing, plus an option to do it silently.
-added exporting/importing palettes in YY-CHR .pal format.
-added a feature that allows LM to display custom tooltips and sprite
 tile arrangements for custom sprites based on the extra info bits
 (as done by a 3rd party ASM hack).  Also added an option to turn
 this off.  Check the help file for more info.
-added an extra category to the "Add Sprites" window called "Custom
 Collections of Sprites", which uses external files to allow custom
 sprites to be added a little more easily than using the "insert
 manual" command.  See the help file for more information.
-enlarged the area used for LM's internal sprite Map16 data, and split
 it up into 2 separate files so custom sprites can use their own file.
 Check the help file for more information.
-replaced Lunar Magic's old code for handling RATs with a modified
 version of the code in Lunar Compress.  This removes the limitation
 LM had about not honoring RATs that existed in a different LoROM bank
 than the data being protected, and also lets LM use the full size
 allowed by the RAT format.
-The FG Map16 data will now be protected by a RAT when saved, to make
 it easier for third party programs to avoid this data.
-converted LM's help file into a compiled HTML help file, as Microsoft
 is phasing out the old WinHelp system.
-thanks goes out to Smallhacker for gathering suggestions and bug
 info.


Version 1.63 September 24, 2005 (5 year Anniversary of Lunar Magic!)

-Adjusted some code so that importing a palette would enable the save
 level button.  Thanks goes out to Juggling Joker for bringing it up.
-Fixed a bug in one of LM's ASM hacks which could cause the game to
 crash if a user inserted custom block ASM that tried to dynamically
 change a tile into a tile that is at or above 0x400.  The fix will
 be installed when you save the Map16 data.  Thanks goes out to
 Darkflight for submitting the hack that revealed the problem.
-Fixed a bug where the 3 8x8s line animation type was copying 4 tiles
 instead of 3 (in the editor).  Thanks goes out to Smallhacker for
 discovering this.
-Fixed some code to prevent a rare case where pasting
 objects/sprites/tiles on the left side of the screen while moving
 left could, if timed correctly, paste the items on the other side
 of the editable area.  Thanks goes out to Smallhacker for pointing
 this out.
-Fixed a couple bugs in the BG editor that involved dragging a tile
 pasted from the 16x16 editor.
-Lowered the max file size allowed for the ExAnimated file to reflect
 the true safe limit for that file (0x1B00, or 0x1A00 for All Stars
 + World, down from 0x2000).
-Fixed the tile arrangements of several platform sprites (5F, 62, A3,
 C4, and E0) in the editor to emulate how the game does it.  Thanks
 goes out to Glyph Phoenix for pointing this out.
-Fixed the tile arrangement of Reznor (A9) in the editor.  Thanks
 goes out to Bio for pointing this out.
-Updated info on the climbing net door sprite (54), to include a
 warning for not putting it on a sub-screen boundary.  Thanks goes
 out to HyperHacker for discovering this.
-Updated info on sprite 88, which is apparently a winged cage that
 Nintendo didn't use.  Thanks goes out to mikeyk & Smallhacker for
 discovering this.
-Moved the control-right click functionality in the palette editor
 for gradients to alt-right click.  This way, when using
 control-left click to copy a color, you don't have to release the
 control key when you right click to paste (making it less annoying
 and more consistent with the other editors).
-Moved the control-right click functionality in the 16x16 editor to
 alt-right click, to make room for the new clipboard shortcuts.
-Added windows clipboard copy/paste using control left and right
 clicks in the 16x16 and 8x8 editor windows.
-The previously hidden credits and title screen editor modes of the
 overworld editor are now standard features.
-Added a new feature that allows overriding the sprite tile
 arrangements that LM uses by including new tile arrangement
 instructions in the sprite tool tip file.  Read the help file
 for more details.


Version 1.62 April 11, 2004

-Fixed a bug that was introduced by the "Count Sprites" option in
 version 1.60.  If the maximum sprites exceeded message box was ever
 actually displayed, it could cause various problems.  Symptoms
 included strange values showing up in the GFX, ExGFX, Insert Level
 and Insert Directory address fields, as well as areas filled with
 garbage tiles showing up in unused portions of the BG Map16 data. 
 The latter is caused by RAT tags getting embedded in the data (1.60
 only), leading to your ROM slowly filling up with useless copies of
 it each time you save the Map16 data.  This version of LM scans the
 BG Map16 data for the tags caused by the bug, and removes them
 before saving to prevent further space from being wasted.  You may
 also need to set the address to insert GFX back to 40200, the
 address for ExGFX back to 100200, and erase garbage tiles left over
 in your BG Map16 data.  Thanks goes out to TheClaw for submitting
 the hack that revealed the problem.
-Fixed a crash bug that would occur if you tried to insert a GFX or
 ExGFX file of size 0.
-Changed some code so that failure to extract a single GFX or ExGFX
 file from the ROM will not abort the rest of the extraction process.
-Fixed a bug introduced in 1.61 where if you have a sprite/object
 selected in the editor and try to use the clipboard keyboard
 shortcuts in the background editor window, the keys would be passed
 to the main editor window and replace the contents of the clipboard
 with the object/sprite selected.
-Updated sprite 5C,5E for info about floating on water with sprite
 buoyancy enabled.  Thanks goes out to Kenny for bringing this up.
-Updated objects 82 and 83 to emulate garbage tiles effect when other
 tiles are placed behind the empty tiles of the bush object.  Thanks
 goes out to thesubrosian for noticing this.
-Added an option in the options menu for turning off the sprite/object
 ID and object size info in the Add Object/Sprite windows, at Jesper's
 request.


Version 1.61 December 25, 2003

-Fixed a bug where if you set a level to use palette animation for
 color 0, Lunar Magic would shut down whenever it tried to read more
 data from the ROM.  Thanks goes out to SomeGuy for pointing this out.
-Fixed a bug where the "Run in Emulator" function wasn't putting quotes
 around the file name and path, causing problems for snes9x when the
 path or file name contained a space.  Thanks goes out to Excel for
 bringing this up.
-Fixed a bug where Lunar Magic would freeze if the user canceled
 expanding in the 8 MB dialog warning, but only if it was done after a
 "not enough room" message.  Thanks goes out to Sendy for discovering
 this.
-Fixed the palette numbers being used by the editor to display the
 bob-omb, para bob-omb, bubble bob-omb, bullet bill, the torpedo
 launcher hand, puff of smoke, and fishin' Boo.  Thanks goes out to
 KT15X and BMF for bringing this up.
-Updated the overworld editor to change the "Nothing?" sprite to "Koopa
 Kid x3", and added display support for it.  Thanks goes out to BMF for
 discovering this!
-Updated sprite 64 (rope mechanism), since it will be long or short
 depending on X&1, and will always be short if the sprite memory index
 is not set to 1.  Also, only 2 long ropes can be on the screen at once
 during gameplay.  Thanks goes out to Sendy for bringing this up.
-Updated tool tips for sprites 4D and 4E (Monty Moles), since they will
 follow Mario or walk with a hop depending on X&1.  Thanks goes out to
 MetaRidley for noticing this.
-Adjusted some code so that using features like the Super GFX dialog
 will no longer cause tileset-specific Map16 data to be unnecessarily
 reloaded from the ROM.  Thanks goes out to Jeffrey for bringing this up.
-Added keyboard shortcuts for the object and sprite editor windows and
 the "Open Level Number" dialog, highlighted the level number in the
 dialog, and added a feature to delete all sprites, objects and exits
 in a level with Ctrl+Delete at HyperHacker's suggestion.
-Added short tileset descriptions to the entries in the "Change Graphics
 in header" dialog, at HyperHacker's suggestion.
-Added buttons to copy and paste the extended animated tile data in the
 appropriate dialog, at Sendy’s suggestion.
-Added Opera-style mouse gestures to the right mouse button.  Left and
 right go back and forth in level history (you can hold shift to force
 this if the Sprite or Object editor window is open).  Shift + Alt with
 left and right goes down/up by one level, and alt right goes to the
 level of the exit on the screen you clicked on.  This feature can be
 disabled in the options menu if you don’t want to use it.


Version 1.60 September 24, 2003 (3rd year Anniversary of Lunar Magic!)

-Included 64 Mbit ExLoROM support (8 meg ROM files).  However, since it
 involves physically moving the ROM banks around which will make the
 ROM incompatible with other SMW utilities, usage is not recommended
 except for those that need an insanely large amount of space.  You
 can use Shift + Page Down to force the conversion.  You will need
 Snes9x 1.39a (or 1.39mk3) or higher to play the ROM (zsnes doesn't
 yet support it).
-The mwl file format has been changed so that levels can be in a
 single, self-contained file instead of the split files used in the
 old format.  Lunar Magic will still be able to open files in the old
 format to maintain backward compatibility.
-Added a new ASM hack that allows you to create new animated tiles and
 do simple palette animation, on a per-level basis.
-Updated the ExGFX ASM hack to allow using up to 0xF00 additional
 ExGFX files, for a total of 0xF80 files.  Also added a new dialog to
 allow Super GFX bypassing, which lets you access the new files and
 setup the FG/BG/SP/ExAn GFX from one dialog.  The settings in it are
 level specific, meaning you don't need to use a global list of GFX
 files to load as with the older bypass code.  The old list method is
 still supported, but it cannot access the new files.
-Added a feature to allow importing a custom palette directly from a
 ZSNES save state.
-Added an option in the options menu for highlighting the tile under
 the mouse cursor in the BG editor.
-Added an option in the options menu to count the number of sprites in
 the level when saving to the ROM, in case you exceed the maximum that
 the game can usually handle.
-Made a couple minor changes to LM's toolbar (added a "Scan for
 Undefined Exits" button, a "Super GFX Bypass" button, and a "Edit
 Extended Animated Frames" button).
-Fixed a bug in how Lunar Magic displays extended object 0x90 (the Boss
 Door).  Due to strange coding on Nintendo's part, the door tiles break
 up when the door is on or beside a screen boundary.  LM has been
 updated to do the same.
-Fixed a special case involving Lunar Magic displaying certain layer 2
 level tiles (on levels using FG/BG tileset 3) with the wrong palette.
-Fixed a bug where hitting Ctrl-6 to advance to the next animated frame
 would have no effect on Yoshi coin palette animation when using a
 custom palette.  Thanks goes out to BMF for pointing this out.
-Added a feature that lets you test the currently loaded ROM in the
 emulator of your choice by hitting F4 in the level or overworld editor.
-Using F5 & F6 in the Map16 editor will also now save and load the
 gameplay settings for the FG Map16 tiles.
-Added a feature that lets you use your own custom map16 data for
 displaying sprites in the editor (does not affect the actual game).
-Adjusted the palette editors so that ctrl-left clicking puts the color
 on the windows clipboard, so you can copy and paste between multiple
 instances of Lunar Magic.
-Added a new mode to the overworld editor to allow moving around the
 sprites.  You can also set Mario's starting position in this mode by
 moving the Mario sprite around.
-Added a tool bar to the overworld editor.
-Added a dialog to the overworld editor to allow changing/deleting the
 overworld sprites for each slot.  Thanks goes out to JW for initial
 research on this.
-Added a dialog to the overworld editor to allow changing the No-Auto
 -Move levels, which is usually used for the switch palace levels.
-Added Windows Clipboard support to the overworld editor's layer 2 8x8
 editing mode for standard cut, copy, and paste operations.
-Added a new ASM hack for the overworld that allows up to 0x4000 silent
 event steps for layer 1 and 2 combined.  The previous limit in the
 editor was 0x100 steps, which turned out to be a mistake since the
 actual limit used by the game was only 0x80 and exceeding it caused
 all silent event steps to not show up during gameplay.
-Included a new setting in the "Extra Options" of the overworld editor
 for toggling the ability to use the start button for scrolling on the
 main overworld map.
-Added a setting to the Boss Sequence dialog of the overworld editor
 for changing which level the earthquake sequence is activated on.
-The OV editor window was not redrawing itself to reflect changes made
 in the "Modify Level Tile Settings" dialog if it was activated using
 an alt-right-click, which has been fixed.
-The OV editor now has an option for viewing tile animation.
-A few of the keyboard shortcuts in the OV editor have been changed to
 be more consistent with the level editor.  Keys 3-6 have been moved
 to 7-0.  Sorry if that causes any confusion, I should have thought
 ahead...
-Added a new menu command to the OV editor to allow setting the FG GFX
 of each individual submap.  You can even specify ExGFX files. 
 However, you must use a star or pipe exit to make the game load the
 different graphics... a normal exit tile won't do it.
-Updated sprites 0x22, 0x23, 0x24, and 0x25 (the net koopas) to
 indicate whether they're below or above the net, which is apparently
 based on their X position.
-Added the ability to shift/wrap the currently selected 8x8 tile in
 the 8x8 tile editor left/right/up/down by one line of pixels using
 the shift and arrow keys.
-Fixed a few places where changing something wouldn't enable the quick
 save button in the main editor (background editor, palette editor). 
 Thanks goes out to Sendy and Someguy for bringing this up.
-If the midway entrance of a level is at the same location as the main
 entrance, the main entrance label will now simply display a leading
 ">" character.  It just looks less messy this way when translucent
 text is enabled.
-Inserted some code to stop Windows from setting the window focus to
 external programs when closing LM's tool windows under certain
 circumstances.  Thanks to the Juggling Joker for mentioning this.
-Fixed the palette number that the Ninji was using when displayed
 by the editor.  Thanks goes out to BMF for pointing this out.
-Fixed an issue where the "Auto-Set Number of Screens" option should
 have really been internally turned off for level (omitted).  Thanks
 goes out to BMF for bringing this up.
-Fixed an issue in the overworld editor where if you modified the
 Map16 data of a layer 1 level tile that can be "revealed" or
 "destroyed" through an event, in the game the revealed or destroyed
 tile still looked like the old unedited tile until the screen was
 refreshed.
-Fixed a bug where one of the extra events in the overworld that were
 removed by Nintendo (event 0x77) was not being enabled for use like
 the others, causing certain problems for any level that tried to use
 it.
-Fixed an issue where using other dialogs while the overworld palette
 editor was open at the same time could cause it to behave strangely.
-Fixed a bug where if you loaded the (omitted) screen in the overworld
 editor, then went back to the level editor and saved the currently
 loaded level, it would corrupt the level's custom palette (if it had
 one).
-Allowed editing the (omitted) screen palette from the overworld
 editor.
-Fixed a bug with the scan for undefined exits, where it wasn't
 checking for horizontal exit pipe tiles.  Thanks goes out to Gandalf
 for pointing this out.
-Removed all except one of the Boss Door tiles from the exit scan,
 since they don't act as a door.
-Fixed a bug in ExGFX support for the Japanese ROM.  Apparently the
 FG/BG GFX tracking code wasn't disabled like it should have been,
 which would cause bypassed FG/BG GFX to not load if you exited to a
 level that used the same GFX file in the standard list as the level
 you came from.  Simply insert your ExGFX with the new version of LM
 to install the fix for this.
-Updated the tool tip for sprite AD (wooden spike moving up/down). 
 It will move up or down first depending on its X position.  Thanks
 goes out to Sendy for pointing this out.
-Updated the tool tip for sprite 19 (instantly displays level message
 #1).  Apparently this sprite also causes Mario's current and last
 saved at overworld map number to be set back to the starting map of
 the game.  Also included an optional fix for the sprite to remove
 this limitation (read the tool tip for more info).
-Updated the tool tip for sprite 9.  The green koopa will jump high
 or low based on (Y&1), not on its height from the ground.  Thanks
 goes out to Lord Allan for bringing this up.
-With the overworld editor completed, this will likely be the last
 major release of Lunar Magic.  Future versions will probably just be
 for fixing any bugs that appear.  A big thank you goes out to the
 whole SMW hacking scene, for helping to make Lunar Magic the program
 it is today.  The last 3 years have been very memorable.  And who
 knows, maybe I'll make another editor some day...  -_^
-Set a new record for time between new releases (1 year).


Version 1.51 September 24, 2002 (...)

-Fixed a bug that caused the program to crash on startup in Win NT/XP
 based systems.
-Set a new record for time between new releases (4 hours).  


Version 1.50 September 24, 2002 (2nd year Anniversary of Lunar Magic!)

-Added a tool bar to the main Lunar Magic level editing window. 
 Buttons that are described as "quick" in the tool tips will skip the
 dialogs that normally appear when using the standard menu items for
 those functions.
-Added a menu item to scan for exit-enabled objects that lead to the
 bonus game levels, and included an option to do the scan automatically
 whenever you save a level to the ROM.  This may help people who
 accidentally use exit-enabled objects without setting them up to go
 anywhere.
-Added the ability to create gradients in the palette editor using
 control right-clicking, as suggested by Sendy.
-Updated creating/eating sprite block information, thanks to Iggy.
-Corrected Dry Bones SP GFX info, thanks to Iggy.
-Updated information for a few sprites that can be made to go away
 using Sprite Command 0xD2, thanks to Iggy.
-Fixed various spelling errors and names, thanks to KJAZZ.
-Apparently there are far more sprites that turn into silver coins
 when a silver POW is hit than I had realized.  Lunar Magic has been
 updated to reflect this.  Thanks goes out to KJAZZ and Dejiko.
-Added extra information on sprite DF, thanks to EYE.
-Corrected the door tool tip, since apparently if Mario is small, he
 CAN enter it while riding Yoshi.  Thanks goes out to EYE for pointing
 this out.
-Corrected a problem where Lunar Magic was not looking for the optional
 *.dsc file when opening a ROM using the command line.  Thanks goes out
 to EYE for pointing this out.
-Lunar Magic would not reload GFX structures 32 and 33 for rendering of
 animated tiles unless you reopened the ROM.  This has been changed so
 that they'll be reloaded whenever you reinsert the GFX.
-Fixed a small bug where hitting cancel in the palette editor would not
 reverse the changes if you had a custom palette.
-Fixed a nasty bug where if Lunar Magic tried to save a table of size 0
 in the ROM, the RAT system would save it with a size of 0x10000.  This
 could later cause large sections of data to get erased since SMW is a
 LoROM game and LM didn't expect data tables to be larger than 0x8000
 bytes.  Thanks goes out to EYE for supplying the hack that revealed
 this problem.
-Added a warning dialog to notify the user when one of the FG/BG/SP GFX
 or ExGFX files loaded by the level is larger then it should be, since
 some tile editors will modify the size of smaller files (which can
 cause glitches in the game).
-Fixed a bug where if you take a level that has a modified background
 image and changed the SNES Registers and Level Settings mode to have a
 level on layer 2, the custom BG flag would not be cleared when saving
 the level.  This could cause several problems.  One, SMW would try to
 decode the data as both a level and a background, though it would only
 display the level data.  In some cases this could cause the game to
 freeze/crash.  Two, Lunar Magic would decode the level data as a
 background but then discard it and display a blank level on layer 2,
 creating the illusion that LM was not saving layer 2.  LM would also
 allow you to use the level number as the source for a background to
 copy in the "Switch BG" menu.  And three, LM would attempt to erase
 the layer 2 level data as background data when saving over the level. 
 Which means that if the level being erased was last saved in LM version
 1.10 to 1.31, it could potentially cause other data in the same bank
 that was last saved in LM version 1.31 or lower to be erased!  (Data
 protected by RATS is unaffected in versions of LM that support it, ie.
 LM 1.40+.)  Thus this version of Lunar Magic correctly clears the
 custom BG flag when saving levels for layer 2, and also has extended
 checking to make erasing old levels with this problem safe for older
 non-RAT protected data.  Thanks goes out to several people on the SMW
 forum for pointing out symptoms of this bug, which has apparently been
 in Lunar Magic for over a year and a half...  O_O
-Cleaned up how Lunar Magic handles changing modes for levels on layer
 2 to images, and vice versa.  When switching to level modes that have
 fewer screens available than the current level mode, Lunar Magic will
 now simply delete the objects and sprites beyond the new maximum number
 of screens.  Also added a warning dialog for this.
-Objects and sprites that are on screens beyond the maximum number of
 screens allowed for the current level mode will no longer be displayed
 on the last screen in Lunar Magic.  The sprites will simply not be
 shown at all, and the objects may overwrite portions of the other level
 layer.  This is to more accurately emulate how SMW displays it.  If you
 have levels created in older versions of LM where the maximum number of
 screens were reduced due to a level mode change, you can hit CTRL-F8 to
 delete any extra objects and sprites.
-Changing the level mode setting will now cause Lunar Magic to
 automatically update the "Use Vertical Entrance Positioning" flag to
 reflect the level layout.
-Added some directional information to the tool tips of certain sprites.
-Added support for ROM_File_Name.ssc files to override the sprite tool
 tips.
-Tool tips will now show up in the Add Objects and Add Sprites windows.
-Tool tips for objects on layer 2 will now show up regardless of which
 editing mode you're in.
-Added a new option for making the text labels and outlines for
 entrances and exits translucent.
-Added support for exporting and importing Tile Layer Pro SNES palette
 files for levels.
-Added an item to the level menu for changing the Map16 page the BG is
 using.
-The background editor has received a long overdue update, and now
 includes multiple tile selection and drag/drop support, plus windows
 clipboard support.
-Attempting to insert non-existent GFX files will no longer mess up
 the ROM.
-Lunar Magic now saves the view animation option in the view menu to
 the registry, so that those with faster computers can start the program
 with this on all the time if they like.
-Lunar Magic will no longer switch to layer 1 editing mode when opening
 a different level.  It will stay in the editing mode you're currently
 in, if possible.
-Lunar Magic now specifies the current directory when opening a file
 dialog to avoid the "My Documents" default folder that Windows 98
 likes to use.
-Updated the dialog for the sprite header properties to explain the
 effects of sprite buoyancy on the game's speed and on interaction
 with layer 2.


Version 1.43 June 13, 2002

-Sprite 66 is apparently an upside down chainsaw, not just a duplicate
 of sprite 65.  Lunar Magic has been updated to reflect this.  A thank
 you goes out to Dwario for pointing this out.
-The OV editor window was not redrawing itself to reflect changes made
 in the "Modify Level Tile Settings" dialog, which has been fixed. 
 Thanks goes out to Sendy for noticing this.
-Added a menu command to allow exporting the level as a 24-bit bitmap
 file.
-Added a "Recent Files" section to the file menu.  
-Fixed a minor bug that caused the editor to refuse to open a MWL file
 if any of the file names within it were longer than 100 characters.
-Added a warning dialog to prevent people from inserting ExGFX as 4bpp
 when the ROM's GFX are still 3bpp or vice versa, as that will appear
 to scramble the graphics of one or the other.  The help file already
 warns against doing this, but apparently not everyone reads it.
-Added a more informative dialog for those that try to write to a
 read-only ROM file.
-The Easter egg for support of SMW in the Mario All Stars + World ROM
 has been turned into a standard feature.


Version 1.42 February 9, 2002

-Fixed a bug from version 1.40 which could occasionally cause the
 bonus game entrance to use secondary entrance 0 or 100, and the Yoshi
 wings to use secondary entrance C8 or 1C8.  The fix will be
 automatically inserted the first time you save a level to the ROM
 using the new version.
-Fixed a bug from version 1.40 where the X value in the main/midway
 entrance dialog for method 2 was sometimes being initialized to the
 wrong setting.
-Fixed a bug in the overworld editor where copying over *all* the
 tiles of the Layer 2 event path tile area in the Layer 2 8x8 editor
 mode with the blank "X" tile could cause rather nasty things to
 happen if saved to the ROM.
-Fixed what appears to be some sort of flaw or oversight on
 Nintendo's part, where the midway point entrance ASM code does not
 check the "Use Vertical Level Positioning for all entrances" flag. 
 The fix will be inserted the first time you save a level to the ROM
 with the new version.  Thanks goes out to Dwario for pointing out
 that there was a problem.
-Added level name editing to the overworld editor (not supported for
 the Japanese version).
-Added level message box text editing to the overworld editor (not
 supported for the Japanese version).
-Added boss sequence text editing to the overworld editor (not
 supported for the Japanese version).
-Added viewing options to show a text label with the level number
 and/or event number beside levels on the overworld in the overworld
 editor.  Thanks to Pikachu14 for the suggestion.
-Added a view option to display all Mario Paths as translucent tiles.
-Added a save prompt for when you try to open a different
 level/ROM/etc without saving the current level/overworld first.  You
 can turn it off in the options menu if you want.
-Added an option that allows LM to remember its window size for the
 next time you run the program.
-Added a dialog to the overworld editor that allows changing the level
 numbers the game checks for when determining if a defeated boss
 sequence or the end game sequence should be displayed.
-Added a dialog to the overworld editor that allows changing the level
 numbers the game checks for to display special messages like the
 switch palaces and Yoshi's house (not supported for the Japanese
 version).
-Added a dialog to the overworld editor that allows altering the level
 numbers the game checks for to enable the changes that occur when
 special world is passed.
-You can now use the "Modify Level Tile Settings" dialog in the
 overworld editor for certain non-level tiles that can be revealed by
 events, such as the translucent bridge and door tiles.
-Sprites 83 and 84 can give a flower or feather, but LM was only
 displaying a mushroom for both, so the program has been updated to
 display the correct images.  Thanks goes out to Sendy for pointing
 this out.
-Added support for ROM_File_Name.dsc files to override LM's tool tips
 for tiles.
-You can now use the middle mouse button to switch between sprite
 editing mode and the last used layer editing mode.


Version 1.41 January 1, 2002

-Fixed a bug from version 1.40 where there was a possibility of part
 of the overworld's layer 2 data being accidentally stored in a
 separate bank from the rest, making it inaccessible to the game and
 Lunar Magic.  Thanks goes out to SomeGuy for submitting his hack
 which revealed the problem.
-Fixed a bug from version 1.40 where one of the sections of data
 saved by the overworld editor was not being erased prior to saving
 a new copy of it.  This means repeatedly saving the overworld would
 result in the gradual build up of undeleted segments of data in
 the ROM.
-Fixed a compatibility bug in the new exit ASM code of version 1.40
 which was causing old style secondary exits to use mangled "Mario
 Action" values during gameplay.  The fix will be automatically
 inserted the first time you save a level to the ROM.  Thanks goes
 out to VinnyMack for pointing this out.
-Corrected a minor flaw in the OV editor's simulation of passing
 events.  Apparently only one tile can be "destroyed" per event...
 in cases where there are multiple entries for the same event, the
 one nearest to the bottom of the list is used.
-The "Future Layer 1 Tiles" option in the View menu of the overworld
 editor will now also make future path tiles translucent.
-You can now use the mouse scroll wheel in Win98 or above to
 increase/decrease the Z order of selected objects/sprites in Lunar
 Magic (I don't have a mouse with a scroll wheel though, so this
 feature hasn't been tested).


Version 1.40 December 25, 2001

-Added two new editing modes and several dialogs to the overworld
 editor for editing layer 1.  It's now possible to move around the
 levels, pipes, star roads, the paths Mario walks on, the event
 activated by passing a level, the direction enabled by passing an
 event, etc.
-A far better method of keeping track of used areas in the expanded
 portion of the ROM has been implemented.  This should prevent any
 future problems like the one in version 1.30.  However, only data
 saved with the new version of LM will use it.
-Added unofficial support for JW's tile set specific animated tile
 modification.
-A new option in the view menu can enable tile animation in the
 editor to mimic the animation you would see in the game for coins,
 question blocks, backgrounds, etc.
-Added two new viewing options to simulate hitting POWs and Silver
 POWs.
-Using a control right click to paste an object/sprite/tile/etc from
 an editor window regardless of what you already have selected has
 been implemented in all editing modes of LM that didn't already have
 it.  The previous function handled by control right clicking in the
 Layer 2 Event Editor Mode of the overworld editor has been moved to
 the shift key.
-Several ASM modifications have been done to SMW's level screen exit
 code.  One such modification has resulted in the removal of the old
 limitation of levels from 0XX not being able to exit to levels in
 1XX and vice versa; any level can now exit to any of the 0x200
 levels, and any level can access any of the 0x200 Secondary
 Entrances.  Note however that this is dependent upon Lunar Magic
 converting the exits in a level from the old style to the new
 style; the old style exits in unmodified levels will still follow
 the old rule.  For example, if you use a new exit to go from one
 level block to another, and then use an old style exit in that level,
 the old style exit will unexpectedly divert you back to the original
 level block.  But this can easily be solved simply by resaving the
 level that contains the old style exit so LM can automatically
 convert all the old style exits in the level to use the new
 enhancement.
-Secondary Entrances can now be set for individual screens, allowing
 you to use both standard and secondary entrances within the same
 level.  Thus the "Enable Secondary Entrances" option in the level
 menu has been moved to the "Add/Modify/Delete Screen Exits" dialog.
-Both the standard and secondary entrance dialogs now have a second
 method for setting the X/Y and Sub-Screen position which allows for
 any X/Y coordinate, with an option for using either the original
 method or the new method for setting Mario's position.
-The standard and secondary entrances can now directly specify if
 the level should be a water level or slippery (or both!), rather
 than using one of the Mario Action settings (which was previously
 the only way one could enable either of these).
-The "Sub-Screen Boundaries" option in the "View" menu has been
 updated to display the screen number and sub-screen label for each
 section, which may make placing entrances a bit easier.
-A few minor modifications have been made to the MWL format to
 accommodate the new exit information that has to be stored.  Older
 versions of LM can still read the newer MWL files, but they will
 import the main and secondary entrances incorrectly.  LM continues
 to remain backwards compatible with MWL files created with older
 versions of the program.
-It's now possible to resize objects using the mouse.  Just move
 the mouse cursor along the right and/or bottom edge of an object's
 tiles until the cursor changes.
-You can now export and import custom level palette files (MW3)
 directly through the file menu.
-An "Export Multiple Levels to Files" command has been added to the
 file menu.
-The "Insert at the original address of the level" option of the
 "Save Level to ROM" dialog has been removed.  It's an old function
 that should have been taken out long ago.
-The "Enhanced Level Management" option in the save level dialog was
 removed, as recent changes have made turning that off inadvisable
 under any circumstances.


Version 1.31 October 1, 2001

-Fixed a nasty bug from 1.30 that could potentially erase non-level
 data such as BG Map16 data, overworld data, etc when saving a level. 
 Thanks goes out to SomeGuy for submitting the patch that revealed
 this problem.
-Fixed a crash bug (!) that would occur in 1.30 if you left-clicked
 on the currently selected 8x8 tile in the 16x16 tile editor window
 without opening the 8x8 editor at least once beforehand.
-In the 16x16 properties dialog of the 16x16 editor window, the
 upper right and bottom left 8x8 tile numbers were switched around. 
 Thanks to Sendy for pointing this out.
-Fixed a bug where FG tiles >= 0x400 in the 16x16 properties dialog
 of the 16x16 editor window incorrectly reported tile gameplay
 settings of 0x130 in the 16x16 editor window, even when they had
 been changed.
-Sprite 18 (a surface jumping fish) is not "unused" as a tool tip
 in 1.30 indicated.  It has now been added to the sprite list, and
 the tool tip has been updated.  A thank you goes out to Iggy for
 pointing this out.
-Sprite A4 (a spike ball that floats on water) is slow or fast
 based on (X&1), so Lunar Magic's description of it has been
 updated.


Version 1.30 September 24, 2001 (1st year Anniversary of Lunar Magic!)

-Lunar Magic now supports the Japanese version of SMW!
-The overworld editor is no longer hidden, as just about everyone
 knows how to get into it by now anyway.  Only minor updates have been
 done to it since the last version.
-Added a dialog to the overworld editor that can switch the music
 selection of the submaps around.  Thanks goes out to ßouché for
 finding the data to support this.
-Added tool tips for objects and sprites in the main editor window. 
 If you have a really old version of comctl32.dll though (earlier than
 4.70), this feature will be automatically disabled.
-The palette editor is now a modeless dialog, meaning you can now keep
 it open while you edit the level.  The main editor window is updated
 immediately whenever changes to the palette are made.
-You can now use a control-left click to copy an existing color in the
 palette editor, and a right click to paste it back in. 
-Reversed the byte order of the SNES color values reported by the
 palette editor, since it was inconsistent with the order of the PC
 color values.
-Fixed a bug that appeared in version 1.20 of Lunar Magic where saving
 a level without a custom palette overtop of a level with a custom
 palette resulted in the level using a custom palette of "random"
 colors.
-Fixed another bug from version 1.20 where the "File", "Exit" command
 was closing the MDI child window instead of the parent window.
-Fixed a bug that caused a Yoshi egg placed at (X&3)==3 to appear
 yellow instead of blue.
-Fixed a couple bugs in rendering Extended Objects 91-96 at certain
 screen coordinates.  A thank you goes out to Iggy for sending me the
 level that allowed me to track this one down.
-Updated the BG ASM hack to support up to 16 pages (0x100 tiles/page)
 of Map16 data, a significant increase over Nintendo's limit of 2
 pages.  You can change the active page used by the background by
 using the Page Up/Down keys in the Background editor window.  Any
 ROM with the old BG ASM enhancement will be automatically detected
 and updated when a modified background is saved.
-Included a new ASM hack to support 16 pages of FG Map16 data, up
 from Nintendo's limit of 2 pages.  The first extended page has been
 made tile set specific, while the rest will remain fixed for all
 levels.  The new tiles can be accessed through the "Direct Map16
 Access" menu of the "Add Objects" window.
-Added the ability to set a FG Map16 tile to "mimic" the gameplay
 properties of another tile.  For example, if you copy a coin tile
 into one of the new FG pages, the tile will not only look like a
 coin, it'll actually act like one too!  To only copy a tile's
 appearance as in previous versions of Lunar Magic, just hold down
 the control key while pasting.
-Added the ability to export/import the currently loaded FG and BG
 Map16 data in the 16x16 Tile Map Editor Window using keyboard
 shortcuts (F2,F3,F5,F6,F7,F8).  Also added confirmation dialogs for
 those keys plus F9.
-Corrected a minor bug in the Background Editor Window, where it was
 using the temporary data of the currently selected tile in the 16x16
 Tile Map Editor Window when placing a tile into the Background Editor
 Window...it _should_ have only been using the tile number.  This
 created the illusion of being able to take a 16x16 tile, modifying
 it and then pasting it directly into the background without actually
 saving it somewhere in the Map16 data first.
-Added several minor enhancements and buttons to the 8x8 editor window.
-Added a music and time limit bypass dialog to override the settings
 in the level header. 
-Improved Drag/Drop logic.  The program isn't as strict regarding
 valid mouse positions when moving things near the edge of the screen
 or an invalid area.
-Repaired a bug where decreasing the Z-order of an object on layer 2
 beyond zero would result in the object jumping to layer 1 (I'm
 surprised this has never been noticed before...)
-Added 32 Mbit (4 meg) ROM expansion support.


Version 1.20 May 20, 2001

-Added a Windows Help file to the program.  The online documentation
 on the website will be taken down, since the help file is more easily
 maintained and generally more helpful.
-Added Cut/Copy/Paste commands for objects/sprites to the "Edit" menu. 
 This allows copying compatible objects or sprites between levels.  In
 fact, since it was implemented using the standard Windows Clipboard,
 you can even copy between multiple instances of Lunar Magic!
-Implemented basic SNES layering and color addition support, so that
 level modes 1E and 1F will now show up in the editor as they would in
 the game.  Although technically none of Nintendo's levels appear to
 have used those modes in the first place, it's still rather interesting
 to be able to make a translucent level. ^^
-Rewrote the animated tile support; Lunar Magic will now read the data
 from the ROM rather than having it hard coded.  Additionally, the
 "On/Off" block and the "always-turning" turn block will now show up
 as they'd appear in the game.
-Included a minor ROM modification that will enable support for the
 animated water surface tile in tile sets 4,5,7,9 & D (in other words,
 all the tile sets where the water surface would show up as a blue
 question block).  The modification will be inserted automatically the
 first time you save a level to the ROM.
-Added an ASM hack to allow appending a selectable ExGFX or GFX file 
 to the end of the animated tile area, for use in animated tiles.
-Added Flip X/Y buttons to the 16x16 editor window.
-Made a few minor modifications to the placement of certain window
 elements.  Probably the most noticeable change is that the status
 bar is now anchored to the bottom of the main window, which is really
 where I should have put it in the first place.
-Fixed a minor bug in the 8x8 tile editor, where it wouldn’t update the 
 colors of the current palette it was using if the window was open while 
 a different level was loaded.  There was also an annoying screen flicker
 when that happened, which has also been fixed.
-The "Add Sprites" window will now display a small line of text at the
 top left of the preview screen to suggest which GFX files could be
 loaded into SP3/SP4 to view the sprite properly.
-Sprite 8C, the smoke and fire generator for Yoshi's house that also
 allows Mario to walk off the edge of the screen without passing the
 level, will apparently not display any smoke or fire when (x&1) is
 true.  Lunar Magic has been updated to do the same.
-Added a third category list to the "Add Sprites" window.  The new
 category will contain the special sprite commands (like layer 2
 scrolling, for example) and the sprite generators.
-Object 12 apparently does not detect and adjust for the tiles it is
 overwriting for the 4 upside-down slopes.  This has been corrected in
 Lunar Magic.  A thank you goes out to Jonathan for noticing this one.
-Lunar Magic will now identify and display in the status bar the contents
 of a block tile that has been placed using the Direct Map16 Access
 feature.
-Put in a warning message to notify the user when the exe file has
 been modified/corrupted by something (like a virus, for example). 
 Previously the program would just silently terminate itself on
 startup when that happened, which wasn’t exactly informative.
-Various other minor updates.
-omitted.


Version 1.11 February 9, 2001 (FuSoYa's Birthday!)

-fixed a bug in the "Bypass Standard SP GFX List" menu that affected
 vertical levels.  It caused Lunar Magic to incorrectly save the list
 index number to the ROM/MWL file and consequently made the game load
 the wrong sprite graphics.
-sprite 63 apparently depends on the value of (x&1), so I fixed it.
-included the "Open Level from Address" file menu command from the
 debug version.  It's useful for viewing some things that aren't in the
 main level pointer table.  Try address 0x30338 for the boss monster
 test room. ^^
-implemented a dialog to manually enter the four 8x8 tiles used to make
 up a 16x16 tile in the 16x16 Tile Map Editor, which is accessible
 through the previously unused "Edit 16x16 Attributes" button.  Although
 standard mouse clicks for copy/paste already do this when the 8x8 Tile 
 Editor Window is open, the former is more intuitive for beginners.
-invalid areas of the main screen are now painted black, rather than
 tiling the background image behind everything.  This is to make it
 easier to see the valid workspace area of the level.
-layer 2 levels are now painted with the default back area color
 rather than a blue gradient, for the sake of correctness.
-omitted. ^^


Version 1.10 December 25, 2000

-added an ASM hack to allow up to 0x80 additional GFX files to be
 stored in the ROM for level use, called ExGFX files.  Also added a 
 FG/BG/SP GFX tileset list bypass hack so a level can access these files.
 Basically, this creates a new table of 0xFF list entries that you have
 direct control over, allowing you to select exactly which 8 GFX files
 are loaded by a level.  Check the documentation for details.
-added an optional ASM hack to allow the use of 4bpp tiles in SMW 
 instead of 3bpp tiles.  In other words, most 8x8 tiles will have 
 access to all 16 colors of a palette instead of only 8. This
 increases the amount of raw GFX data to compress by ~25% though.
-modified the GFX insertion code so that if you run out of room
 inserting at 0x40200-0x60200, it will insert the rest of the GFX
 to the expanded portion of the ROM instead of just giving an error.
-modified the GFX insertion code to use the level manager whenever
 graphics are stored in the expanded ROM space (meaning it will 
 erase the old GFX and scan to ensure it doesn't overwrite things).
-added the "Classic Piranha Plant" and "Death Bat Ceiling" to the
 sprite list, since they can be safely implemented now with ExGFX.
-determined that "Sprite Display 1" in the sprite header selects 
 the sprite memory and the maximum number of sprites per screen.
-added a couple menu items that allow you to extract and insert the
 shared SMW palettes, useful for backing up and restoring colors.
-located and implemented the last missing level palette colors!
-editing the colors of the palette loaded by a level is now supported.
-added another ASM hack to give any level the option of having its
 own custom palette instead of using the standard shared palettes.
-registered another file type (MW3) for storing custom Mario World
 level palettes.
-the title screen colors are now loaded into the main level palette
 when viewing intro level 0xC7, unless it has a custom palette.
-Lunar Magic now inserts a minor hack into the ROM when saving level 
 0xC7 (the intro level) to prevent the game menu from changing the
 back area color to other hard-coded values.  If you don't want the 
 hack inserted for some reason, hit F8 before saving this level.
-a basic background tilemap editor is finally in place, as well as a 
 new ASM hack to support storing BG tilemaps in the extended ROM area.
-a new view menu item called "Special World Passed" was added, to allow 
 viewing level differences caused by completing Special World.
-I've removed the "Custom Collections of Objects" category from the 
 "Add Objects" window...this is only usable in the debug version
 anyway.  Consequently, the "custom.bin" and "custom.txt" files are no
 longer included in the zip file distribution.
-the options in the "Options" menu will now be saved to the Windows
 registry.
-fixed a potential bug in the level manager that could cause Lunar Magic
 to crash when trying to erase a corrupt level in the ROM.
-fixed a bug where the level manager wasn't correctly scanning some 
 sprite pointers.  This means that when it was removing a level there
 was a small chance that some data would only be partially erased.
-various other minor changes.


Version 1.03 October 28, 2000

-fixed a bug that was caused by an accidental change I made in version
 1.01.  It seems the "Sprite Display 1" value in the "Level/Change
 Sprite Header" menu was no longer being saved, making it impossible
 to change the value in the GUI.  Thanks goes out to DarKnight13 for
 pointing this out.
 
 
Version 1.02 October 10, 2000

-fixed a bug that I suspect was causing an overlapping level problem
 for many people.  Apparently when saving a level to the ROM, Lunar
 Magic wasn't storing the last address used to the ROM until after
 you did another ROM operation.  Which means if you went and saved a
 level, immediately exited LM (or reloaded the ROM), then later came
 back and saved a different level without changing the address that
 showed up, you'd often end up over-writing the first level.
 I can't believe I never noticed this bug until now... O_O
-implemented Enhanced Level Management.  Enabling this option will
 cause Lunar Magic to erase the level being replaced (if it's in the
 expanded ROM area), then scan and adjust the destination address to
 avoid overwriting any other data.  For best results, don't use this
 on old test ROM's that will likely have multiple undeleted and
 unreferenced levels from older versions of Lunar Magic.


Version 1.01 October 2, 2000

-fixed a minor display bug involving sprites in vertical levels.
-included an option for using joined GFX files instead of split ones.
-included Layer 3 options in the "Change Other Properties" Menu.
-documented the unknown bit in the "Change Properties in Header" Menu,
 which controlled Layer 3 layering.
 (thanks goes out to Mr. 207 for noticing what this bit was doing)
-documented and replaced the second value of the "Change Properties in
 Sprite Header" with options for sprite buoyancy.


Version 1.00 September 24, 2000

-First Release.


______________________________________________________________________

 4. Legal Notice
______________________________________________________________________

 The Lunar Magic Mario World Level Editor program (hereafter referred
 to as the "Software") is not official or supported by Nintendo or any
 other commercial entity.

 The Software is freeware thus it can be distributed freely provided
 the following conditions hold:(1) This document is supplied with the
 Software and both the document and Software are not modified in any
 way (2) The Software is not distributed with or as part of any ROM
 image in any format, and (3) No goods, services, or money can be
 charged for the Software in any form, nor may it be included in
 conjunction with any other offer or monetary exchange.

 The Software is provided AS IS, and its use is at your own risk.
 Anyone mentioned in this document will not be held liable for any
 damages, direct or otherwise, arising from its use or presence.
 

______________________________________________________________________

 5. Contact Information
______________________________________________________________________

 FuSoYa
   www:   http://fusoya.eludevisibility.org (http://fusoya.cjb.net)
   ???:   06942508

______________________________________________________________________
